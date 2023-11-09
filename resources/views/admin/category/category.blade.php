<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          All Categories
      </h2>
      @if(auth()->check())
      <span>Welcome, {{ auth()->user()->name }}!</span>
  @endif
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <div class="container">
                  <div class="row">
                      <div class="col-md-8">
                          <div class="card">
                              <table class="table">
                                  <thead>
                                      <tr>
                                          <th scope="col">ID</th>
                                          <th scope="col">Category Name</th>
                                          <th scope="col">User ID</th>
                                          <th scope="col">Created At</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @php
                                          $i = 1;
                                      @endphp
                                      @foreach ($categories as $category)
                                          <tr>
                                              <th scope="row">{{$i++ }}</th>
                                              <td>{{$category->category_name }}</td>
                                              <td>{{$category->user_id }}</td>
                                              <td>{{$category->created_at->diffforHumans() }}</td>

                                            </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="card">
                              <form method="POST" action="{{ route('category.store') }}">
                                  @csrf
                                  <div class="card-body">
                                      <div class="form-group">
                                          <label for="category_name">Category Name</label>
                                          <input type="text" class="form-control" name="category_name" required>
                                      </div>
                                      <button type="submit" class="btn btn-primary">Submit</button>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
