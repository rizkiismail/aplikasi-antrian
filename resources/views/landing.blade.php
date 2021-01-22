@extends('layouts.main')

@section('content')
    <div class="container mt-5 mb-5">
        @if (session('msg'))
            <div class="alert alert-info">
                {{ session('msg') }}
            </div>
        @endif

        <input type="hidden" id="antrianMahasiswa" value="<?=($antrian && count($antrian) >= 1 ? "true" : "false")?>">

        @if (count($antrian) >= 1 )
            <input type="hidden" id="antrianMahasiswaId" value="<?=$antrian[0]->antrian_id?>">
            <div class="row mb-5" style="box-shadow: 4px 3px 10px 4px #05050533;">
                <div class="col-4 text-center bg-primary">
                    <p class="mb-0 text-white" style="font-size: 120px" id="nomorAntrian"><?=$antrian[0]->no_antrian?></p>
                </div>
                <div class="col-8 py-3">
                    <h4 id="bagianAntrian">Antrian <?=$antrian[0]->bagian?></h4>
                    <h5 id="nameMahasiswa"><?=$antrian[0]->name?></h5>
                    <label for="" class="badge badge-warning" style="font-size: 15px" id="statusAntrian"><?=$antrian[0]->status?></label>
                    <div>
                        <button class="btn btn-info pull-right" id="tungguAntrian">Menunggu <?=$tunggu?> antrian</button>
                    </div>
                </div>
            </div>
        @endif
        
        <div class="row">
            <div class="col-4" style="display: grid;">
                <div class="card p-3" style="box-shadow: 4px 3px 10px 4px #05050533;">
                    <div class="text-center bg-primary">
                        <p class="mb-0 text-white" style="font-size: 120px" id="antrianUmum">0</p>
                    </div>
                    
                    <h4 class="mt-3">Daftar Antrian Umum</h4>
                    <button class="btn btn-info mb-2" id="antrianStatusUmum">Ready</button>
                    <div id="daftarAntrianUmum"></div>
                    <p>...</p>

                    @if (count($antrian) == 0)
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary mt-auto" data-toggle="modal" data-target="#exampleModalCenter1" id="formDaftarUmum">
                            Daftar
                        </button>
                    @endif 
                </div>
            </div>

            <div class="col-4" style="display: grid;">
                <div class="card p-3" style="box-shadow: 4px 3px 10px 4px #05050533;">
                    <div class="text-center bg-warning">
                        <p class="mb-0 text-white" style="font-size: 120px" id="antrianKeuangan">0</p>
                    </div>
                    
                    <h4 class="mt-3">Daftar Antrian Keuangan</h4>
                    <button class="btn btn-info mb-2" id="antrianStatusKeuangan">Ready</button>
                    <div id="daftarAntrianKeuangan"></div>
                    <p>...</p>
                    @if (count($antrian) == 0)
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-warning mt-auto" data-toggle="modal" data-target="#exampleModalCenter" id="formDaftarKeuangan">
                            Daftar
                        </button>
                    @endif
                </div>
            </div>

            <div class="col-4" style="display: grid;">
                <div class="card p-3" style="box-shadow: 4px 3px 10px 4px #05050533;">
                    <div class="text-center bg-success">
                        <p class="mb-0 text-white" style="font-size: 120px" id="antrianJurusan">0</p>
                    </div>
                    
                    <h4 class="mt-3">Daftar Antrian Jurusan</h4>
                    <button class="btn btn-info mb-2" id="antrianStatusJurusan">Ready</button>
                    <div id="daftarAntrianJurusan"></div>
                    <p>...</p>

                    @if (count($antrian) == 0)
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success mt-auto" data-toggle="modal" data-target="#exampleModalCenter2" id="formDaftarJurusan">
                            Daftar
                        </button>
                    @endif 
                </div>
            </div>
        </div>  
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Isi Data Berikut</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Umum</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <form method="post" class="mt-3" action="<?=url("daftarAntrian/3")?>">
                        @csrf
                            <div class="form-group">
                                <label for="">NIM</label>
                                <input type="text" name="nim" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            
                            <textarea name="keperluan" class="form-control" cols="100" rows="2" placeholder="Tuliskan keperluanmu!" required></textarea>
                            <button class="btn btn-warning pull-right mt-2" type="submit">Daftar</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <form method="post" class="mt-3" action="<?=url("daftarAntrianUmum/3")?>">
                        @csrf
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">No Handphone</label>
                                <input type="text" name="no_handphone" class="form-control" required>
                            </div>
                            
                            <textarea name="keperluan" class="form-control" cols="100" rows="2" placeholder="Tuliskan keperluanmu!" required></textarea>
                            <button class="btn btn-warning pull-right mt-2" type="submit">Daftar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Isi Data Berikut</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab1" data-toggle="tab" href="#home1" role="tab" aria-controls="home1" aria-selected="true">Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab1" data-toggle="tab" href="#profile1" role="tab" aria-controls="profile1" aria-selected="false">Umum</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home1" role="tabpanel" aria-labelledby="home-tab1">
                        <form method="post" class="mt-3" action="<?=url("daftarAntrian/1")?>">
                        @csrf
                            <div class="form-group">
                                <label for="">NIM</label>
                                <input type="text" name="nim" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            
                            <textarea name="keperluan" class="form-control" cols="100" rows="2" placeholder="Tuliskan keperluanmu!" required></textarea>
                            <button class="btn btn-primary pull-right mt-2" type="submit">Daftar</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="profile1" role="tabpanel" aria-labelledby="profile-tab1">
                        <form method="post" class="mt-3" action="<?=url("daftarAntrianUmum/1")?>">
                        @csrf
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">No Handphone</label>
                                <input type="text" name="no_handphone" class="form-control" required>
                            </div>
                            
                            <textarea name="keperluan" class="form-control" cols="100" rows="2" placeholder="Tuliskan keperluanmu!" required></textarea>
                            <button class="btn btn-primary pull-right mt-2" type="submit">Daftar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Isi Data Berikut</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#home2" role="tab" aria-controls="home2" aria-selected="true">Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#profile2" role="tab" aria-controls="profile2" aria-selected="false">Umum</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home2" role="tabpanel" aria-labelledby="home-tab2">
                        <form method="post" class="mt-3" action="<?=url("daftarAntrian/2")?>">
                        @csrf
                            <div class="form-group">
                                <label for="">NIM</label>
                                <input type="text" name="nim" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            
                            <textarea name="keperluan" class="form-control" cols="100" rows="2" placeholder="Tuliskan keperluanmu!" required></textarea>
                            <button class="btn btn-success pull-right mt-2" type="submit">Daftar</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="profile2" role="tabpanel" aria-labelledby="profile-tab2">
                        <form method="post" class="mt-3" action="<?=url("daftarAntrianUmum/2")?>">
                        @csrf
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">No Handphone</label>
                                <input type="text" name="no_handphone" class="form-control" required>
                            </div>
                            
                            <textarea name="keperluan" class="form-control" cols="100" rows="2" placeholder="Tuliskan keperluanmu!" required></textarea>
                            <button class="btn btn-success pull-right mt-2" type="submit">Daftar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var baseUrl = $('#baseUrl').val();
        $(document).ready(function() {
            selesai();
        });
        
        function selesai() {
            setTimeout(function() {
                update();
                selesai();
            }, 1000);
        }
        
        function update() {
            $.getJSON(baseUrl + '/getAntrian/1', function(data) {
                $('#antrianUmum').html(data.result);
            });

            $.getJSON(baseUrl + '/getAntrian/3', function(data) {
                $('#antrianKeuangan').html(data.result);
            });

            $.getJSON(baseUrl + '/getAntrian/2', function(data) {
                $('#antrianJurusan').html(data.result);
            });

            $.getJSON(baseUrl + '/daftarAntrian/1', function(data) {
                hasil = "";
                $.each(data.result, function() {
                    hasil += "<p>" + this['no_antrian'] + ". " + this['name'] +"</p>";
                });
                $('#daftarAntrianUmum').html(hasil);
            });

            $.getJSON(baseUrl + '/daftarAntrian/3', function(data) {
                hasil = "";
                $.each(data.result, function() {
                    hasil += "<p>" + this['no_antrian'] + ". " + this['name'] +"</p>";
                });
                $('#daftarAntrianKeuangan').html(hasil);
            });

            $.getJSON(baseUrl + '/daftarAntrian/2', function(data) {
                hasil = "";
                $.each(data.result, function() {
                    hasil += "<p>" + this['no_antrian'] + ". " + this['name'] +"</p>";
                });
                $('#daftarAntrianJurusan').html(hasil);
            });

            $.getJSON(baseUrl + '/getStatusAntrian/1', function(data) {
                if(data.result == "break"){
                    $('#formDaftarUmum').addClass('d-none');
                }else{
                    $('#formDaftarUmum').removeClass('d-none');
                }

                $('#antrianStatusUmum').html(data.result);
            });

            $.getJSON(baseUrl + '/getStatusAntrian/3', function(data) {
                if(data.result == "break"){
                    $('#formDaftarKeuangan').addClass('d-none');
                }else{
                    $('#formDaftarKeuangan').removeClass('d-none');
                }

                $('#antrianStatusKeuangan').html(data.result);
            });

            $.getJSON(baseUrl + '/getStatusAntrian/2', function(data) {
                if(data.result == "break"){
                    $('#formDaftarJurusan').addClass('d-none');
                }else{
                    $('#formDaftarJurusan').removeClass('d-none');
                }

                $('#antrianStatusJurusan').html(data.result);
            });

            if($('#antrianMahasiswa').val() == "true"){
                antrian_id = $('#antrianMahasiswaId').val();
                $.getJSON(baseUrl + '/cekAntrian/' + antrian_id, function(data) {
                    $('#nameMahasiswa').html(data.result.name);
                    $('#statusAntrian').html(data.result.status);
                    $('#bagianAntrian').html("Antrian " + data.result.bagian);
                    $('#nomorAntrian').html(data.result.no_antrian);
                    $('#tungguAntrian').html("Menunggu " + data.result.tunggu + " antrian");
                });
            }
        }
    </script>
@endsection