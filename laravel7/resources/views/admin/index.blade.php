@extends('layout.admins')

@section('title',$title)

@section('content')
<div class="block-area" id="basic">
                    <h3 class="block-title">Basic Example with Panel</h3>
                    <div class="tile p-15">
                        <form role="form">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control input-sm" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            
                            <div class="form-group">
                                 <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control input-sm" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            
                            <p>Some Help level texts here...</p>
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <span class="btn btn-file btn-sm btn-alt">
                                    <span class="fileupload-new">Select file</span>
                                    <span class="fileupload-exists">Change</span>
                                    <input type="file">
                                </span>
                                <span class="fileupload-preview"></span>
                                <a href="#" class="close close-pic fileupload-exists" data-dismiss="fileupload">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                            
                            <button type="submit" class="btn btn-sm m-t-10">Login</button>
                            <button type="submit" class="btn btn-sm m-t-10">Cancel</button>
                        </form>
                    </div>
                </div>

@stop