    @extends('layouts.maintemplate')
  

    @section('title', 'Movies')

    @section('content')    


    <div class="container my-3">
        <h2 class="list-movie">List Movie</h2>
    </div>

    <form action="" method="get">
        <div class="input-group search-index">
            <button class="btn btn-secondary bi bi-search" type="submit"></button>
            <input type="text" class="form-control" name="keyword" placeholder="Search Movie" >
            
              <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Genre
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/?keyword=horror">Horror , {{ count($horror) }}</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="/?keyword=comedy">Comedy , {{ count($comedy) }}</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="/?keyword=romance">Romance , {{ count($romance) }}</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="/?keyword=action">Action , {{ count($action) }}</a></li>
              </ul>

              <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Tahun
              </button>
              @foreach($movieList as $data)
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/?keyword=2021">2021</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="/?keyword=2022">2022</a></li>
                @endforeach
              </ul>

        </div>
    </form>

    {{-- Popup Message --}}
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            {{ Session::get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>    
    @endif  

     {{-- Popup Error Message --}}
     @if(Session::has('warning'))
        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
            {{ Session::get('warning') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>    
    @endif  

    {{-- Popup Comment Added Message --}}
    @if(Session::has('comment-success'))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            {{ Session::get('comment-success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>    
    @endif  

    {{-- Popup Comment Empty Message --}}
    @if(Session::has('comment-empty'))
        <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
            {{ Session::get('comment-empty') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>    
    @endif 

    

<div class="container">
    <div class="row row-position">
        @foreach ($movieList as $movie)   
        <div class="col-md-4 mt-5 text-center">
            <div class="card text-white bg-dark mb-5 " style="width: 15rem;">
                @if($movie->genres->name == 'Horror')
                <span class="badge text-bg-secondary">{{ $movie->genres->name }}</span>

                @elseif($movie->genres->name == 'Comedy')
                <span class="badge text-bg-warning">{{ $movie->genres->name }}</span>

                @elseif($movie->genres->name == 'Romance')
                <span class="badge text-bg-danger">{{ $movie->genres->name }}</span>

                @elseif($movie->genres->name == 'Action')
                <span class="badge text-bg-success">{{ $movie->genres->name }}</span>
                
                @endif
                
                <img src="{{ asset('storage/gambar/'. $movie->image ) }}" class="card-img-top image-height">
                    <div class="card-body">
                        <p class="font-tahun">{{ $movie->tahun }}</p>
                        <h5 class="card-title judul-movie">{{ $movie->judul }}</h5>
                        
            {{-- OffCanvas Reviews --}}   
            <button class="btn btn-outline-light tombol-detail" type="button" data-bs-toggle="offcanvas" data-bs-target="#comment-{{ $movie->id }}" aria-controls="offcanvasWithBothOptions">Reviews</button>
            <div class="offcanvas offcanvas-start text-bg-dark" data-bs-scroll="true" tabindex="-1" id="comment-{{ $movie->id }}" aria-labelledby="offcanvasWithBothOptionsLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title judul-movie" id="comment-{{ $movie->id }}">{{ $movie->judul }}</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="container" style="width: 10rem;">
                        <p class="font-tahun">{{ $movie->tahun }}</p>
                        <img src="{{ asset('storage/gambar/'. $movie->image ) }}" class="card-img-top">
                    </div>
                    <div class="container">
                        <strong class="genre-detail">Genre : {{ $movie->genres->name }}</strong>
                    </div>

                    
                    

                    <div class="container">
                        <h5 class="font-reviews">Comments :
                            {{-- Star Rating --}}
                            
                            {{-- Add Comment Section --}} 
                                         

                            <form action="/comment-store" method="post">
                                @csrf  

                                <div class="mt-1">
                                    <i class="bi bi-star"></i>
                                    <select name="rating" id="rating" class="bg-dark text-white rating">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>

                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                                <textarea name="text" class="form-control font-reviews" id="text" placeholder="Add Your Comment" cols="30" rows="2"></textarea>
                                <button type="submit" class="btn btn-warning mt-2 font-reviews" >Add Comment</button>        

                                {{-- Dropdown Rating --}}
                                
                            </form>
                        </h5>
                    </div>
                    
                    
                            <div class="offcanvas-body">
                                <div class="container comment-section">  

                                        @forelse ($movie->comment as $data)
                                        
                                    
                                        @if ($data->user->role_id == 1)
                                            
                                            <div class="container mx-2">

                                                <small>{{ date_format($data->created_at, "d M Y") }}</small>
                                                <br>
                                                <span class="badge rounded-pill text-bg-success">Admin</span>
                                                <strong>{{ $data->user->name }} <br> </i></p></strong>                                           
                                                    
                                                <p class="comment-font"><i class="bi bi-star"> {{ $data->rating }} <br> {{ $data->text }}</i></p>
                
                                            </div>


                                        @endif
                                            
                                        @if($data->user->role_id == 2) 

                                            <div class="container mx-2">

                                                <small>{{ date_format($data->created_at, "d M Y") }}</small>
                                                <br>
                                                <strong>{{ $data->user->name }}</strong> 
                                                    
                                                <p class="comment-font"><i class="bi bi-star"> {{ $data->rating }} <br> {{ $data->text }} </i></p>

                                                    
                                            </div>
                                                
                                        @endif
       
                                        @empty
                                            <strong class="no-comments">No Comments</strong>
                                        @endforelse
                                        
                                </div>
                            </div>

                   
                 
                        
                    </div>

                    {{-- OffCanvas Detail Film --}}
                    <button class="btn btn-outline-light tombol-detail" type="button" data-bs-toggle="offcanvas" data-bs-target="#judul-{{ $movie->id }}" aria-controls="offcanvasWithBothOptions">Detail Film</button>
                        <div class="offcanvas offcanvas-end text-bg-dark" data-bs-scroll="true" tabindex="-1" id="judul-{{ $movie->id }}" aria-labelledby="offcanvasWithBothOptionsLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title judul-movie" id="judul-{{ $movie->id }}">{{ $movie->judul }}</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div class="container" style="width: 10rem;">
                                    <p class="font-tahun">{{ $movie->tahun }}</p>
                                    <img src="{{ asset('storage/gambar/'. $movie->image ) }}" class="card-img-top">
                                </div>
                                <div class="container">
                                    <strong class="genre-detail">Genre : {{ $movie->genres->name }}</strong>
                                </div>
                                <div class="container">
                                    <strong class="deskripsi-detail">Deskripsi Film :</strong>
                                </div>
                            <div class="offcanvas-body isi-deskripsi">
                            {{ $movie->deskripsi }}
                            </div>
                    </div>
                    {{-- Tags Section --}}
                    @foreach ($movie->tags as $tags)

                        <a href="/?keyword={{ $tags->name }}"><span class="badge rounded-pill text-bg-warning tags">{{ $tags->name }}</span></a>

   
                    @endforeach
                    
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

        
     <div class="mb-5">
        {{ $movieList->withQueryString()->links() }}
     </div>
    
@endsection