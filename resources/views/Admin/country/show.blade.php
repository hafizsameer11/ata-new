   @extends('Admin.index')

   @section('css')
       <style>
           body {
               background-color: #f8f9fa;
               padding-top: 50px;
           }

           .container {
               max-width: 1200px;
           }

           .table-container {
               margin-top: 30px;
           }

           .status-active {
               color: green;
               font-weight: bold;
           }

           .status-inactive {
               color: red;
               font-weight: bold;
           }
       </style>
   @endsection

   @section('content')
       <div class="container">
           <div class="container p-4 card mt-4">
               <div class="d-flex justify-content-between align-items-center mb-4">
                   <h1>Destination List</h1>
               </div>
           </div>
           <div class="p-4 card d-flex flex-row justify-content-between align-items-center">
               <a style="background-color: #EE1C25" class="fs-5 btn btn-primary p-2" href="{{ route('country.create') }}">Add
                   Destination</a>
               <div>
                   {{-- filtername --}}
                   <form action="{{ route('countries.filterForm') }}" method="get">
                       @csrf
                       <div class="input-group">
                           <input type="text" name="search" class="form-control" placeholder="Search by name">
                           <button class="btn btn-primary" type="submit">Search</button>
                       </div>
                   </form>

               </div>
           </div>
           @if (session('success'))
               <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                   {{ session('success') }}
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
           @endif
           <div class="table-container table-responsive">
               <table class="table table-responsive table-bordered table-striped">
                   <thead>
                       <tr>
                           <th>Destination Image</th>
                           <th>Destination Name</th>
                           <th>Destination Status</th>
                           <th>Actions</th>
                       </tr>
                   </thead>
                   <tbody>
                       @foreach ($countries as $item)
                           <tr>
                               <td>
                                   <img src="{{ asset('storage/' . $item->image) }}" alt="" width="50"
                                       class="rounded">
                               </td>
                               <td>{{ $item->name }}</td>
                               <td class="status-active">
                                   <span class="badge  btn-{{ $item->status ? 'success' : 'danger' }}">
                                       {{ $item->status ? 'Active' : 'Inactive' }}
                                   </span>
                               </td>
                               <td>
                                   <div class="d-flex align-items-center gap-2">
                                       <a class="btn btn-warning" href="{{ route('country.edit', $item->id) }}">Update</a>
                                       <form action="{{ route('country.destroy', $item->id) }}" method="post">
                                           @csrf
                                           @method('DELETE')
                                           <button class="btn btn-danger">Delete</button>
                                       </form>
                                   </div>
                               </td>
                           </tr>
                       @endforeach

                   </tbody>
               </table>
           </div>
           <div class="pagination  justify-content-center mt-4">
               {{ $countries->links('pagination::bootstrap-5') }}
           </div>
       </div>
   @endsection
