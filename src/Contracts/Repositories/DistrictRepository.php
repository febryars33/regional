<?php

namespace Snairbef\Regional\Contracts\Repositories;

use Snairbef\Regional\Commons\Repository\Interface\RepositoryInterface as Repository;
use Snairbef\Regional\Contracts\WithPagination;
use Snairbef\Regional\Contracts\WithSearch;

interface DistrictRepository extends Repository, WithPagination, WithSearch {}
