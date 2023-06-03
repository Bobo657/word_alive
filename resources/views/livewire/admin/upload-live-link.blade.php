<div class="content-body">
    <!-- row -->	
    <div class="page-titles">
        <ol class="breadcrumb">
            <li><h5 class="bc-title">Dashboard Settings</h5></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">
                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Home </a>
            </li>
            <li class="breadcrumb-item "><a href="javascript:void(0)">Dashboard Settings</a></li>
        </ol>
    </div>
 
    <div class="container-fluid">
        <div class="row justify-content-center mb-5 mt-5">

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h4 class="card-title text-white">Livestreamed Services Form</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            @if (cache()->get('youtube'))
                                <div class="alert alert-primary left-icon-big alert-dismissible fade show">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i class="fa-solid fa-xmark"></i></span>
                                    </button>
                                    <div class="media">
                                        <div class="alert-left-icon-big">
                                            <span><i class="mdi mdi-email-alert"></i></span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mt-1 mb-2"></h6>
                                            <p class="mb-0">You have uploaded a Youtube video id. If you wish to remove it, <br>simply click on the button provided below:</p>
                                            <button type="button" wire:click.prevent="removeYoutubeVideo" class="btn tp-btn btn-light btn-xs">Remove</button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="mb-3 col-md-9">
                                <input placeholder="Youtube Video ID" type="text" wire:model="youtube" class="form-control">
                                @error('youtube') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3 col-md-3 mt-1">
                                <button type="button" wire:click.prevent="shareYoutubeVideo" class="btn tp-btn btn-dark btn-sm">Share Video</button>
                            </div>
                        </div>

                        <div class="row">
                        @if (cache()->get('facebook'))
                                <div class="alert alert-primary left-icon-big alert-dismissible fade show">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i class="fa-solid fa-xmark"></i></span>
                                    </button>
                                    <div class="media">
                                        <div class="alert-left-icon-big">
                                            <span><i class="mdi mdi-email-alert"></i></span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mt-1 mb-2"></h6>
                                            <p class="mb-0">You have uploaded a facebook video. If you wish to remove it, <br>simply click on the button provided below:</p>
                                            <button type="button" wire:click.prevent="removeFacebookVideo" class="btn tp-btn btn-light btn-xs">Remove</button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="mb-3 col-md-9">
                                <input placeholder="Facebook Video" type="text" wire:model.lazy="facebook" class="form-control">
                                @error('facebook') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3 col-md-3 mt-1">
                                <button type="button" wire:click.prevent="shareFacebookVideo" class="btn tp-btn btn-dark btn-sm">Share Video</button>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>