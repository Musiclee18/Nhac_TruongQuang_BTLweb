@extends('layout')
@section('content')
<div class="c-layout-page">
    <div class="c-layout-breadcrumbs-1 c-fonts-uppercase c-fonts-bold c-bordered c-bordered-both">
       <div class="container">
          <div class="c-page-title c-pull-left">
             <h3 class="c-font-uppercase c-font-sbold"><a href="#" title="video tin tức">Videos highlight</a></h3>
          </div>
          <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
             <li><a href="{{ url('/') }}">Trang chủ</a></li>
             <li>/</li>
             <li>
                <a href="#">
                   <h1>Videos highlight</h1>
                </a>
             </li>
          </ul>
       </div>
    </div>
    <div class="c-content-box c-size-md">
       <div class="container">
          <form class="form-horizontal form-find m-b-20" role="form" method="get" data-hs-cf-bound="true">
             <div class="row">
                <div class="col-md-4">
                   <input type="text" class="form-control c-square c-theme" name="key" autocomplete="off" autofocus="" placeholder="Nhập từ khóa..." value="" style="width: 100%">
                </div>
                <div class="col-md-4">
                   <input type="submit" class="btn c-theme-btn c-btn-square m-b-10" value="Tìm kiếm">
                   <a class="btn c-btn-square m-b-10 btn-danger" href="https://nick.vn/video">Tất cả</a>
                </div>
             </div>
          </form>
          <div class="row">
             <div class="col-md-9">
                <div class="art-list">
                    @foreach ($videos as $key =>$video)
                    <div class="a-item">
                        <div class="thumbnail-image img-thumbnail"><a href="#">
                            <img src="{{ asset('uploads/video/'.$video->image) }}" alt="png-image"></a></div>
                        <div class="info">
                           <div class="article_title ">
                              <h2><a href="#" style="text-transform: initial;">{{ $video->title }}</a></h2>
                           </div>
                           <div class="article_cat_date">
                              <div style="display: inline-block;margin-right: 15px"><i class="fa fa-calendar" aria-hidden="true"></i> 25/01/2025</div>
                              <div style="display: inline-block"><i class="fa fa-newspaper-o" aria-hidden="true"></i> <a href="/video/huong-dan" title="Hướng Dẫn">Hướng Dẫn</a></div>
                           </div>
                           <div class="article_description hidden-xs">{!! $video->description !!}</div>
                        </div>
                     </div>
                    @endforeach


                </div>
                <div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">
                    {{ $videos->links('pagination::bootstrap-4') }}
                </div>
             </div>
             <div class="col-md-3">
                <div class="c-content-ver-nav">
                   <div class="c-content-title-1 c-theme c-title-md c-margin-t-40">
                      <h3 class="c-font-bold c-font-uppercase">Danh mục</h3>
                      <div class="c-line-left c-theme-bg"></div>
                   </div>
                   <ul class="c-menu c-arrow-dot1 c-theme">
                      <li><a href="/video">Tất cả (34)</a></li>
                      <li><a href="/video/uy-tin-cua-nickvn">Uy Tín Của Nick.vn (1)</a></li>
                      <li><a href="/video/bai-ghim">Bài Ghim (4)</a></li>
                      <li><a href="/video/tin-game">Tin Game (10)</a></li>
                      <li><a href="/video/huong-dan">Hướng Dẫn (19)</a></li>
                   </ul>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
@endsection
