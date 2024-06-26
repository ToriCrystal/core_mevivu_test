<?php

namespace App\Admin\Services\Blog\Category;

use App\Admin\Services\Blog\Category\CategoryServiceInterface;
use App\Admin\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryService implements CategoryServiceInterface
{
    protected $data;
    protected $repository;
    public function __construct(CategoryRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function store(Request $request)
    {
        $this->data = $request->validated();
        return $this->repository->create($this->data);
    }
    public function update(Request $request)
    {
        $this->data = $request->validated();
        return $this->repository->update($this->data['id'], $this->data);
    }
    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
