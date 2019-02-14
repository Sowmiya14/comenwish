@extends('admin.layout.master')
@section('vendor')
   active
@endsection
@section('content')
   <!-- Title & Breadcrumbs-->
   <div class="row page-titles">
       <div class="col-md-12 align-self-center">
           <h4 class="theme-cl">Pending Vendor Type Approve </h4>
       </div>
   </div>    
   @include('admin.layout.errors')    
   <!-- Table Card -->
   <div class="card">
       <div class="table-responsive">
           <table class="table table-striped table-2 table-hover">
               <thead>
                   <tr>
                       <th>Vendor Id</th>
                       <th>Vendor Product Id</th>
                       <th>Action</th>
                   </tr>
               </thead>
               <tbody>
               @foreach($unapproved_vendortype as $data)
                   <tr>
                       <td>{{ $data->vendorcode }}</td>
                       <td>{{\App\Helpers\Helper::getVendorname($data->vendorproduct_id)  }}</td>
                       <td>
                        <!-- onclick="return confirm('Are you sure?')" -->
                           <a href="#" class="label label-info"  onclick="event.preventDefault(); 
                           if(confirm('Have you verified the vendor and are you sure want to proceed with approval?') ==true){
                            document.getElementById('approve-vendortype-{{$data->id}}').submit();}">Approve</a>
                                                      
                           <form id="approve-vendortype-{{$data->id}}" action="{{  route('admin.approve-vendortype',$data->id) }}" method="POST" style="display: none;">
                               {{ csrf_field() }}
                           </form>
                       </td>
                   </tr>
               @endforeach                </tbody>
           </table>
       </div>
   </div>
   <!-- /.Table Card -->@endsection
