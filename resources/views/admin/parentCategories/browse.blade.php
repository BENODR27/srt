
@extends('layouts.adminlayout')
@section('content')

<div class="container-fluid page-body-wrapper">
      @include('../includes.sidebar')
      <div class="main-panel">
        <div class="content-wrapper">
        <a href="{{route('parentCategory.add')}}" class="btn btn-primary text-white m-2 "><i class="mdi mdi-plus"></i></a>
        <div class="col-lg-12 grid-margin stretch-card">
            
              <div class="card">
                
                <div class="card-body">

                  <h4 class="card-title">Parent Categories List</h4>
                  
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            CategoryName
                          </th>
                        
                          <th>
                            Actions
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($parentCategories as $item)
                      <tr>
                          <td>
                           {{$item->parentCategoryName}}
                          </td>
                        
                          <td>
                          <a href="{{route('parentCategory.edit',['id' => $item->id])}}" class="btn btn-success"><i class="mdi mdi-grease-pencil"></i></a>
                          <a href="{{route('parentCategory.delete',['id' => $item->id])}}" class="btn btn-danger"><i class="mdi mdi-delete-variant"></i></a>                          
                          
                        </td>
                        </tr>
    
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>


        </div>
        @include('../includes.footer')
      </div>
    </div>
    @endsection