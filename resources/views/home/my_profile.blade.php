@extends('layouts.user')
@section('content')
    <!-- Content wrapper -->
  <div class="content-wrapper">
        <!-- Content -->
        
    <div class="container-xxl flex-grow-1 container-p-y">
            
                  
      <h4 class="fw-semibold mb-4">My Profile</h4>

      <!-- Basic Layout -->
      <div class="row">
        <!-- Statistics -->
        <div class="col-xl-12 mb-4 col-lg-7 col-12">
          <div class="card h-100">
            <div class="card-header">
              <div class="d-flex justify-content-between mb-3">
                <h5 class="card-title mb-0"></h5>
                <small class="text-muted"></small>
              </div>
            </div><br>
            <div class="card-body">
              <div class="col-md-6">
              <label class="form-label" >Name : {{auth()->user()->name}}</label>
            </div><br>
          <div class="col-md-6">
            <label class="form-label" >Email : {{auth()->user()->email}}</label>
          </div>

      
            </div>
          </div>
        </div>
        <!--/ Statistics -->

      </div>
@stop