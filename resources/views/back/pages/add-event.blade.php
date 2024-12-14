@extends('back.layouts.pages-layout')
@section('page-title', isset($pageTitle) ? $pageTitle : 'Añadir Evento')

@section('page-header')
<div class="row g-2 align-items-center">
    <div class="col">
      <h2 class="page-title">
        Añadir nuevo evento
      </h2>
    </div>
</div>
@endsection

@section('content')
<div class="row row-cards">
    <div class="col-12">
        <form action="{{ route('admin.events.create') }}" method="post" id="addEventForm" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="mb-3">
                                <label class="form-label">Título del Evento</label>
                                <input type="text" class="form-control" name="tit_eve" placeholder="Ingrese el título del evento">
                                <span class="text-danger error-text tit_eve_error"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Descripción</label>
                                <textarea class="ckeditor form-control" name="des_eve" rows="6" placeholder="Contenido..."
                                    id="des_eve"></textarea>
                                <span class="text-danger error-text des_eve_error"></span>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="mb-3">
                                <div class="form-label">Fecha de Inicio</div>
                                <div class="d-flex gap-2">
                                    <!-- Campo de fecha más amplio -->
                                    <div class="input-icon mb-2 flex-grow-1">
                                        <input class="form-control" name="fec_ini_eve" placeholder="Seleccione una fecha" id="datepicker-icon" value="2020-06-20">
                                        <span class="input-icon-addon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                                <path stroke="none" d="M0 0h24V0H0z" fill="none"></path>
                                                <path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z"></path>
                                                <path d="M16 3v4"></path>
                                                <path d="M8 3v4"></path>
                                                <path d="M4 11h16"></path>
                                                <path d="M11 15h1"></path>
                                                <path d="M12 15v3"></path>
                                            </svg>
                                        </span>
                                    </div>
                                    <!-- Campo de hora más estrecho -->
                                    <div class="mb-2" style="flex-basis: 150px;">
                                        <input type="text" name="event_start_time" class="form-control" data-mask="00:00:00" data-mask-visible="true" placeholder="00:00:00" autocomplete="on">
                                    </div>
                                </div>
                                <span class="text-danger error-text fec_ini_eve_error"></span>
                            </div>
        
                            <div class="mb-3">
                                <div class="form-label">Fecha de Fin</div>
                                <div class="d-flex gap-2">
                                    <!-- Campo de fecha más amplio -->
                                    <div class="input-icon mb-2 flex-grow-1">
                                        <input class="form-control" name="fec_fin_eve" placeholder="Seleccione una fecha" id="datepicker-icon" value="2020-06-20">
                                        <span class="input-icon-addon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                                <path stroke="none" d="M0 0h24V0H0z" fill="none"></path>
                                                <path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z"></path>
                                                <path d="M16 3v4"></path>
                                                <path d="M8 3v4"></path>
                                                <path d="M4 11h16"></path>
                                                <path d="M11 15h1"></path>
                                                <path d="M12 15v3"></path>
                                            </svg>
                                        </span>
                                    </div>
                                    <!-- Campo de hora más estrecho -->
                                    <div class="mb-2" style="flex-basis: 150px;">
                                        <input type="text" name="event_end_time" class="form-control" data-mask="00:00:00" data-mask-visible="true" placeholder="00:00:00" autocomplete="on">
                                    </div>
                                </div>
                                <span class="text-danger error-text fec_fin_eve_error"></span>
                                <span class="text-danger error-text event_end_eve_error"></span>
                            </div>
                            
                            <div class="mb-3">
                                <div class="form-label">Imagen Destacada</div>
                                <input type="file" class="form-control" name="featured_image">
                                <span class="text-danger error-text featured_image_error"></span>
                            </div>
                            <div class="image_holder mb-2" style="max-width: 250px">
                                <img src="" alt="" class="img-thumbnail" id="image-previewer" data-ijabo-default-img="">
                            </div>
                            <div class="mb-3">
                                <label for="tag_eve" class="form-label">Tags del Evento</label>
                                <input type="text" class="form-control" name="tag_eve">
                                <span class="text-danger error-text tag_eve_error"></span>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Dirección</label>
                                <input type="text" class="form-control" name="dir_eve" placeholder="Ingrese la dirección del evento">
                                <span class="text-danger error-text dir_eve_error"></span>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar Evento</button>
                        </div>
                        
                    </div>
                </div>
            </div>
        </form>        
    </div>
</div>



@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const today = new Date();
        const formattedDate = today.toISOString().split('T')[0];
        document.querySelector('input[name="fec_ini_eve"]').value = formattedDate;
        document.querySelector('input[name="fec_fin_eve"]').value = formattedDate;
    });
    
    //CKEditor Script
    document.addEventListener('DOMContentLoaded', function() {
        ClassicEditor
            .create(document.querySelector('#des_eve'))
            .then(editor => {
                window.editor = editor; // Save the instance globally
                editor.editing.view.change(writer => {
                    writer.setStyle('min-height', '200px', editor.editing.view.document.getRoot());
                });
            })
            .catch(error => {
                console.error(error);
            });
    });

    $(document).ready(function() {
        
        $('input[type="file"][name="featured_image"]').ijaboViewer({
            preview: "#image-previewer",
            allowedExtensions: ['jpg', 'jpeg', 'png'],
            onInvalidType: function(message, element) {
                toastr.error(message);
            }
        });

        $('form#addEventForm').on('submit', function(e) {
            e.preventDefault();
            toastr.remove();
            var form = this;
            var formData = new FormData(form);
            if (window.editor) {
                formData.append('des_eve', window.editor.getData());
            }

            $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                data: formData,
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(form).find('span.error-text').text('');
                },
                success: function(response) {
                    toastr.remove();
                    if(response.code == 1){
                        $(form)[0].reset();
                        $('div.image_holder').find('img').attr('src', '');
                        $('input[name="tag_eve"]').amsifySuggestags();
                        if (window.editor) {
                            window.editor.setData('');
                        }
                        toastr.success(response.msg);
                    } else {
                        //console.log(response.msg);
                        toastr.error(response.msg);
                    }
                },
                error: function(response) {
                    toastr.remove();
                    if(response.responseJSON && response.responseJSON.errors) {
                        $.each(response.responseJSON.errors, function(prefix, val) {
                            $(form).find('span.' + prefix + '_error').text(val[0]);
                        });
                    } else {
                        toastr.error('An error occurred. Please try again.');
                    }
                }
            });
        });
    });
</script>
@endpush