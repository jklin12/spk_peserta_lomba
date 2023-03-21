@extends('layouts.default')

@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link href="{{ URL::asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/css/smart_wizard_all.min.css" rel="stylesheet" type="text/css" />
@endpush
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Tambah Alternative {{ $anggota->nama_lengkap}}</h1>
    </div>

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card mb-4">
        <div class="card-body">
            <div id="smartwizard">
                <ul class="nav">
                    @foreach($kriterias as $key => $kriteria)
                    <li class="nav-item">
                        <a class="nav-link" href="#step-{{$key}}">
                            <div class="num">C{{ $loop->iteration }}</div>
                            {{$kriteria->nama_kriteria}}
                        </a>
                    </li>
                    @endforeach

                </ul>

                <div class="tab-content">

                    @csrf
                    @foreach($kriterias as $key => $kriteria)
                    <div id="step-{{ $key }}" class="tab-pane" role="tabpanel" aria-labelledby="step-{{ $key }}">
                        <span>Bagaimana {{ $kriteria->nama_kriteria.' '.$anggota->nama_lengkap }} ?</span>
                        <form action="" class="kriteria-form">
                            <div class="mx-2 my-2">
                                <div class="form-check">
                                    <input class="form-check-input kriteria-input" type="radio" name="kriteria-{{$kriteria->id_kriteria}}" id="exampleRadios1" value="1" data-key="{{$kriteria->id_kriteria}}">
                                    <label class="form-check-label" for="exampleRadios1">
                                        Sangat Tidak Sesuai
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input kriteria-input" type="radio" name="kriteria-{{$kriteria->id_kriteria}}" id="exampleRadios2" value="2" data-key="{{$kriteria->id_kriteria}}">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Tidak Sesuai
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input kriteria-input" type="radio" name="kriteria-{{$kriteria->id_kriteria}}" id="exampleRadios3" value="3" data-key="{{$kriteria->id_kriteria}}">
                                    <label class="form-check-label" for="exampleRadios3">
                                        Sesuai
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input kriteria-input" type="radio" name="kriteria-{{$kriteria->id_kriteria}}" id="exampleRadios4" value="4" data-key="{{$kriteria->id_kriteria}}">
                                    <label class="form-check-label" for="exampleRadios4">
                                        Cukup Sesuai
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input kriteria-input" type="radio" name="kriteria-{{$kriteria->id_kriteria}}" id="exampleRadios5" value="5" data-key="{{$kriteria->id_kriteria}}">
                                    <label class="form-check-label" for="exampleRadios5">
                                        Sangat Sesuai
                                    </label>
                                </div>

                            </div>
                        </form>
                    </div>
                    @endforeach

                </div>

                <!-- Include optional progressbar HTML -->
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>


</div>

<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Hapus Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah anda yakin menghapus <strong id="delete-name"></strong></div>
            <form action="" method="POST" id="delete-form">
                @csrf
                @method('DELETE')
            </form>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <button class="btn btn-danger" form="delete-form" type="submit">Ya</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ URL::asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>
<!-- Page level custom scripts -->

<script>
    function onConfirm() {
        var postVal = new FormData();
        postVal.append('id_anggota', '<?= $anggota->id_anggota ?>');
        $('input[type=radio]').each(function() {

            if ($(this).prop("checked")) {
                var key = $(this).data('key');
                var value = $(this).val();
                postVal.append("kriteria[" + key + "]", value);
            }
        })

        //var json = JSON2.stringify(arrNumber);

        $.ajax({
            url: '<?= route('alternative.store') ?>',
            method: 'POST',
            data: postVal,
            contentType: false,
            cache: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                window.location.href = "<?= route('alternative.index') ?>";
            }
        });
    }
    $(document).ready(function() {
        $('#nav-alternative').addClass('active')


        $('#dataTable').DataTable();


        $('.delete-btn').click(function() {
            $('#delete-name').html($(this).data('name'))
            $('#delete-form').attr('action', $(this).data('route'))
        })



        $("#smartwizard").on("showStep", function(e, anchorObject, stepIndex, stepDirection, stepPosition) {
            $("#prev-btn").removeClass('disabled').prop('disabled', false);
            $("#next-btn").removeClass('disabled').prop('disabled', false);
            if (stepPosition === 'first') {
                $("#prev-btn").addClass('disabled').prop('disabled', true);
            } else if (stepPosition === 'last') {
                $("#next-btn").addClass('disabled').prop('disabled', true);
            } else {
                $("#prev-btn").removeClass('disabled').prop('disabled', false);
                $("#next-btn").removeClass('disabled').prop('disabled', false);
            }

            // Get step info from Smart Wizard
            let stepInfo = $('#smartwizard').smartWizard("getStepInfo");
            $("#sw-current-step").text(stepInfo.currentStep + 1);
            $("#sw-total-step").text(stepInfo.totalSteps);

            if (stepPosition == 'last') {

                $("#btnFinish").prop('disabled', false);
            } else {
                $("#btnFinish").prop('disabled', true);
            }

            // Focus first name
            if (stepIndex == 1) {
                setTimeout(() => {
                    $('#first-name').focus();
                }, 0);
            }
        });

        $('#smartwizard').smartWizard({
            theme: 'arrows',
            toolbar: {
                showNextButton: true, // show/hide a Next button
                showPreviousButton: true, // show/hide a Previous button
                position: 'bottom', // none/ top/ both bottom
                extraHtml: `<button class="btn btn-success" id="btnFinish" disabled onclick="onConfirm()">Finish</button>
                              <button class="btn btn-danger" id="btnCancel" onclick="onCancel()">Cancel</button>`
            },
            anchor: {
                enableNavigation: true, // Enable/Disable anchor navigation 
                enableNavigationAlways: false, // Activates all anchors clickable always
                enableDoneState: true, // Add done state on visited steps
                markPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                unDoneOnBackNavigation: true, // While navigate back, done state will be cleared
                enableDoneStateNavigation: true // Enable/Disable the done state navigation
            },
        });

    })
</script>

@endpush