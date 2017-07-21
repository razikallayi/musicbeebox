@extends('admin.layout.master')

@section('title', 'Dashboard')

@section('content')
<div class="row">


        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="card">
                <div class="header bg-brown">
                    <h2>Upload Video </h2>
                </div>
                <div class="body">
                    <div class="list-group">
                        <a href="{{url('admin/upload-video')}}" class="list-group-item">Upload</a>
                        <a href="{{url('admin/manage-video')}}" class="list-group-item">Manage</a>
                    </div>
                </div>
            </div>
        </div>  
{{-- 
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="card">
                <div class="header bg-brown">
                    <h2>Category</h2>
                </div>
                <div class="body">
                    <div class="list-group">
                        <a href="{{url('admin/add-category')}}" class="list-group-item">Add</a>
                        <a href="{{url('admin/manage-category')}}" class="list-group-item">Manage</a>
                    </div>
                </div>
            </div>
        </div>  


        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="card">
                <div class="header bg-brown">
                    <h2>Subcategory</h2>
                </div>
                <div class="body">
                    <div class="list-group">
                        <a href="{{url('admin/add-subcategory')}}" class="list-group-item">Add</a>
                        <a href="{{url('admin/manage-subcategory')}}" class="list-group-item">Manage</a>
                    </div>
                </div>
            </div>
        </div>  


        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="card">
                <div class="header bg-brown">
                    <h2>Audio</h2>
                </div>
                <div class="body">
                    <div class="list-group">
                        <a href="{{url('admin/add-audio')}}" class="list-group-item">Add</a>
                        <a href="{{url('admin/manage-audio')}}" class="list-group-item">Manage</a>
                    </div>
                </div>
            </div>
        </div>  

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="card">
                <div class="header bg-brown">
                    <h2>Comments</h2>
                </div>
                <div class="body">
                    <div class="list-group">
                        
                        <a href="{{url('admin/manage-comments')}}" class="list-group-item">Manage</a>
                    </div>
                </div>
            </div>
        </div>  


 --}}

 </div>
@endsection

@section('scripts')
@parent

<script type="text/javascript">
//Activate current item in left side menu
$(document).ready(function() {
   $(".menu .list li").removeClass('active');
   $("#mnu-dashboard").addClass('active').find('a').click();
});
</script>

@endsection