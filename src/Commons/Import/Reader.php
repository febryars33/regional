<?php

namespace Snairbef\Regional\Commons\Import;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use League\Csv\Reader as CsvReader;

abstract class Reader
{
    /**
     * The columns of the reader.
     *
     * @var array
     */
    public array $columns = [];

    /**
     * The path of the file.
     *
     * @var string
     */
    public string $path = '';

    /**
     * The model instance.
     *
     * @var Model
     */
    protected Model $model;

    /**
     * The uppercase flag.
     *
     * @var boolean
     */
    public bool $uppercase = true;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Return a new instance of CsvReader from the given path.
     */
    public function reader(): CsvReader
    {
        $reader = CsvReader::createFromPath($this->getPath(), 'r');
        $reader->setHeaderOffset(0);

        return $reader;
    }

    /**
     * Insert or ignore a new record into the model's table.
     *
     * @param  array  $value
     * @return bool
     */
    public function import(array $value): bool
    {
        return $this->model::query()->insertOrIgnore($value);
    }

    /**
     * Set the columns of the reader.
     */
    protected function setColumns(array $array): Reader
    {
        $this->columns = $array;

        return $this;
    }

    /**
     * Return the columns of the reader.
     */
    public function getColumns(): array
    {
        return $this->columns;
    }

    /**
     * Return the path of the file.
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * Set the path of the file.
     */
    protected function setPath(string $path): Reader
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Retrieve a collection of records from the reader.
     */
    public function collection(): Collection
    {
        return collect($this->reader()->getRecords());
    }

    /**
     * Get the total number of records in the collection.
     */
    public function count(): int
    {
        return $this->collection()->count();
    }

    public function getRecords(): array
    {
        return $this->collection()->map(function (array $record) {
            return $this->mapRecordColumns($record);
        })->values()->toArray();
    }

    /**
     * Map and transform record values based on defined columns.
     */
    protected function mapRecordColumns(array $record): array
    {
        return collect($this->columns)->mapWithKeys(function ($column) use ($record) {
            return [
                $column => $this->transform($column, $record[$column] ?? null),
            ];
        })->toArray();
    }

    protected function transform(string $key, ?string $value)
    {
        if (str_ends_with($key, '_id')) {
            return intval($value);
        }

        return match ($key) {
            'id' => intval($value),
            'name' => $this->uppercase ? strtoupper($value) : strtolower($value),
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
            default => $value
        };
    }
}
