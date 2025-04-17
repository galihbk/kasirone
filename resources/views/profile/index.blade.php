<x-app-layout>
    @section('title', 'Detail Profil')
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Profil</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Detail Profil</a></li>
            </ol>
        </div>
        <div class="profile card card-body px-3 pt-3 pb-0">
            <div class="profile-head">
                <div class="photo-content">
                    <div class="cover-photo rounded d-flex align-items-center">
                        <div style="width:100%;">
                            <h1 class="text-center text-white">{{$user->business?->name}}</h1>
                        </div>
                    </div>
                </div>
                <div class="profile-info">
                    <div class="profile-photo">
                        <img src="{{url('assets-admin')}}/images/profile/profile.png" class="img-fluid rounded-circle" alt="">
                    </div>
                    <div class="profile-details">
                        <div class="profile-name px-3 pt-2">
                            <h4 class="text-primary mb-0">{{Auth::user()->name}}</h4>
                            <p style="text-transform: capitalize">{{Auth::user()->role}}</p>
                        </div>
                        <div class="profile-email px-2 pt-2">
                            <h4 class="text-muted mb-0">{{Auth::user()->email}}</h4>
                            <p>Email</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card h-auto">
            <div class="card-body">
                <div class="profile-tab">
                    <div class="custom-tab-1">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item" role="presentation"><a href="#my-data" data-bs-toggle="tab" class="nav-link active show" aria-selected="true" role="tab">Data Pribadi</a>
                            </li>
                            <li class="nav-item" role="presentation"><a href="#password" data-bs-toggle="tab" class="nav-link" aria-selected="false" tabindex="-1" role="tab">Password</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="my-data" class="tab-pane fade active show" role="tabpanel">
                                <div class="my-post-content pt-3">
                                </div>
                            </div>
                            <div id="password" class="tab-pane fade" role="tabpanel">
                                <div class="profile-about-me">
                                    <div class="pt-4 border-bottom-1 pb-3">
                                        <h4 class="text-primary">About Me</h4>
                                        <p class="mb-2">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence was created for the bliss of souls like mine.I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents.</p>
                                        <p>A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame.</p>
                                    </div>
                                </div>
                                <div class="profile-skills mb-5">
                                    <h4 class="text-primary mb-2">Skills</h4>
                                    <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Admin</a>
                                    <a href="javascript:void(0);" class="btn btn-success light btn-xs mb-1">Dashboard</a>
                                    <a href="javascript:void(0);" class="btn btn-danger light btn-xs mb-1">Photoshop</a>
                                    <a href="javascript:void(0);" class="btn btn-info light btn-xs mb-1">Bootstrap</a>
                                    <a href="javascript:void(0);" class="btn btn-warning light btn-xs mb-1">Responsive</a>
                                    <a href="javascript:void(0);" class="btn btn-secondary light btn-xs mb-1">Crypto</a>
                                </div>
                                <div class="profile-lang  mb-5">
                                    <h4 class="text-primary mb-2">Language</h4>
                                    <a href="javascript:void(0);" class="text-muted pe-3 f-s-16"><i class="flag-icon flag-icon-us"></i> English</a> 
                                    <a href="javascript:void(0);" class="text-muted pe-3 f-s-16"><i class="flag-icon flag-icon-fr"></i> French</a>
                                    <a href="javascript:void(0);" class="text-muted pe-3 f-s-16"><i class="flag-icon flag-icon-bd"></i> Bangla</a>
                                </div>
                                <div class="profile-personal-info">
                                    <h4 class="text-primary mb-4">Personal Information</h4>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Name <span class="pull-end">:</span>
                                            </h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span>Mitchell C.Shay</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Email <span class="pull-end">:</span>
                                            </h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span>example@examplel.com</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Availability <span class="pull-end">:</span></h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span>Full Time (Free Lancer)</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Age <span class="pull-end">:</span>
                                            </h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span>27</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Location <span class="pull-end">:</span></h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span>Rosemont Avenue Melbourne,
                                                Florida</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Year Experience <span class="pull-end">:</span></h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span>07 Year Experiences</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="replyModal">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Post Reply</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <textarea class="form-control" rows="4">Message</textarea>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Reply</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('script')
    <script>
        $(document).ready(function () {


        });
    </script>
@endsection
</x-app-layout>
