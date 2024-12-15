@extends('back.layouts.pages-layout')
@section('page-title', isset($pageTitle) ? $pageTitle : 'Añadir nuevo evento')

@section('page-header')
<div class="row g-2 align-items-center">
    <div class="col">
      <h2 class="page-title">
        Editar Evento
      </h2>
    </div>
</div>
@endsection

@section('content')

<form action="{{ route('admin.events.update-event',['id_eve'=>Request('id_eve')]) }}" method="post" id="editEventForm" enctype="multipart/form-data">
    @csrf
    
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <div class="mb-3">
                        <label class="form-label">Título del Evento</label>
                        <input type="text" class="form-control" name="tit_eve" placeholder="Ingrese el título del evento"
                        value="{{ $event->tit_eve }}">
                        <span class="text-danger error-text tit_eve_error"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <textarea class="ckeditor form-control" name="des_eve" rows="6" placeholder="Contenido..."
                            id="des_eve">{!! $event->des_eve !!}</textarea>
                        <span class="text-danger error-text des_eve_error"></span>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="mb-3">
                        <div class="form-label">Fecha de Inicio</div>
                        <div class="d-flex gap-2">
                            <!-- Campo de fecha más amplio -->
                            <div class="input-icon mb-2 flex-grow-1">
                                <input class="form-control" name="fec_ini_eve" placeholder="Seleccione una fecha" id="datepicker-icon-start" 
                                value="{{ \Carbon\Carbon::parse($event->fec_ini_eve)->format('Y-m-d') }}">
                                <span class="input-icon-addon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z"></path><path d="M16 3v4"></path><path d="M8 3v4"></path><path d="M4 11h16"></path><path d="M11 15h1"></path><path d="M12 15v3"></path></svg>
                                </span>
                            </div>
                            <!-- Campo de hora más estrecho -->
                            <div class="mb-2" style="flex-basis: 150px;">
                                <input type="text" name="event_start_time" class="form-control" data-mask="00:00:00" data-mask-visible="true" placeholder="00:00:00" autocomplete="on"
                                value="{{ \Carbon\Carbon::parse($event->fec_ini_eve)->format('H:i:s') }}">
                            </div>
                        </div>
                        <span class="text-danger error-text fec_ini_eve_error"></span>
                    </div>

                    <div class="mb-3">
                        <div class="form-label">Fecha de Fin</div>
                        <div class="d-flex gap-2">
                            <!-- Campo de fecha más amplio -->
                            <div class="input-icon mb-2 flex-grow-1">
                                <input class="form-control" name="fec_fin_eve" placeholder="Seleccione una fecha" id="datepicker-icon-end" 
                                value="{{ \Carbon\Carbon::parse($event->fec_fin_eve)->format('Y-m-d') }}">
                                <span class="input-icon-addon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z"></path><path d="M16 3v4"></path><path d="M8 3v4"></path><path d="M4 11h16"></path><path d="M11 15h1"></path><path d="M12 15v3"></path></svg>
                                </span>
                            </div>
                            <!-- Campo de hora más estrecho -->
                            <div class="mb-2" style="flex-basis: 150px;">
                                <input type="text" name="event_end_time" class="form-control" data-mask="00:00:00" data-mask-visible="true" placeholder="00:00:00" autocomplete="on"
                                value="{{ \Carbon\Carbon::parse($event->fec_fin_eve)->format('H:i:s') }}">
                            </div>
                        </div>
                        <span class="text-danger error-text fec_fin_eve_error"></span>
                        <span class="text-danger error-text event_end_time_error"></span>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-label">Imagen Destacada</div>
                        <input type="file" class="form-control" name="featured_image">
                        <span class="text-danger error-text featured_image_error"></span>
                    </div>
                    <div class="image_holder mb-2" style="max-width: 250px">
                        <img src="" alt="" class="img-thumbnail" id="image-previewer" 
                        data-ijabo-default-img="{{ $event->resource_img_url }}">
                    </div>
                    <div class="mb-3">
                        <label for="tag_eve" class="form-label">Tags del Evento</label>
                        <input type="text" class="form-control" name="tag_eve"
                        value="{{ $event->tag_eve }}">
                        <span class="text-danger error-text tag_eve_error"></span>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Dirección</label>
                        <input type="text" class="form-control" name="dir_eve" placeholder="Ingrese la dirección del evento"
                        value="{{ $event->dir_eve }}">
                        <span class="text-danger error-text dir_eve_error"></span>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Evento</button>
                </div>
                
            </div>
        </div>
    </div>
</form>

<div class="litepicker" style="display: none;" data-plugins=""><div class="container__main"><div class="container__months"><div class="month-item"><div class="month-item-header"><button type="button" class="button-previous-month"><!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 6l-6 6l6 6"></path></svg></button><div><strong class="month-item-name">June</strong><span class="month-item-year">2020</span></div><button type="button" class="button-next-month"><!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 6l6 6l-6 6"></path></svg></button></div><div class="month-item-weekdays-row"><div title="Monday">Mon</div><div title="Tuesday">Tue</div><div title="Wednesday">Wed</div><div title="Thursday">Thu</div><div title="Friday">Fri</div><div title="Saturday">Sat</div><div title="Sunday">Sun</div></div><div class="container__days"><div class="day-item" data-time="1590987600000" tabindex="0">1</div><div class="day-item" data-time="1591074000000" tabindex="0">2</div><div class="day-item" data-time="1591160400000" tabindex="0">3</div><div class="day-item" data-time="1591246800000" tabindex="0">4</div><div class="day-item" data-time="1591333200000" tabindex="0">5</div><div class="day-item" data-time="1591419600000" tabindex="0">6</div><div class="day-item" data-time="1591506000000" tabindex="0">7</div><div class="day-item" data-time="1591592400000" tabindex="0">8</div><div class="day-item" data-time="1591678800000" tabindex="0">9</div><div class="day-item" data-time="1591765200000" tabindex="0">10</div><div class="day-item" data-time="1591851600000" tabindex="0">11</div><div class="day-item" data-time="1591938000000" tabindex="0">12</div><div class="day-item" data-time="1592024400000" tabindex="0">13</div><div class="day-item" data-time="1592110800000" tabindex="0">14</div><div class="day-item" data-time="1592197200000" tabindex="0">15</div><div class="day-item" data-time="1592283600000" tabindex="0">16</div><div class="day-item" data-time="1592370000000" tabindex="0">17</div><div class="day-item" data-time="1592456400000" tabindex="0">18</div><div class="day-item" data-time="1592542800000" tabindex="0">19</div><div class="day-item is-start-date is-end-date" data-time="1592629200000" tabindex="0">20</div><div class="day-item" data-time="1592715600000" tabindex="0">21</div><div class="day-item" data-time="1592802000000" tabindex="0">22</div><div class="day-item" data-time="1592888400000" tabindex="0">23</div><div class="day-item" data-time="1592974800000" tabindex="0">24</div><div class="day-item" data-time="1593061200000" tabindex="0">25</div><div class="day-item" data-time="1593147600000" tabindex="0">26</div><div class="day-item" data-time="1593234000000" tabindex="0">27</div><div class="day-item" data-time="1593320400000" tabindex="0">28</div><div class="day-item" data-time="1593406800000" tabindex="0">29</div><div class="day-item" data-time="1593493200000" tabindex="0">30</div></div></div></div></div><div class="container__tooltip"></div>
</div>
<div class="litepicker" style="display: block; position: absolute; z-index: 9999; top: 3536.19px; left: 457.6px;" data-plugins=""><div class="container__main"><div class="container__months"><div class="month-item"><div class="month-item-header"><button type="button" class="button-previous-month"><!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 6l-6 6l6 6"></path></svg></button><div><strong class="month-item-name">June</strong><span class="month-item-year">2020</span></div><button type="button" class="button-next-month"><!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 6l6 6l-6 6"></path></svg></button></div><div class="month-item-weekdays-row"><div title="Monday">Mon</div><div title="Tuesday">Tue</div><div title="Wednesday">Wed</div><div title="Thursday">Thu</div><div title="Friday">Fri</div><div title="Saturday">Sat</div><div title="Sunday">Sun</div></div><div class="container__days"><div class="day-item" data-time="1590987600000" tabindex="0">1</div><div class="day-item" data-time="1591074000000" tabindex="0">2</div><div class="day-item" data-time="1591160400000" tabindex="0">3</div><div class="day-item" data-time="1591246800000" tabindex="0">4</div><div class="day-item" data-time="1591333200000" tabindex="0">5</div><div class="day-item" data-time="1591419600000" tabindex="0">6</div><div class="day-item" data-time="1591506000000" tabindex="0">7</div><div class="day-item" data-time="1591592400000" tabindex="0">8</div><div class="day-item" data-time="1591678800000" tabindex="0">9</div><div class="day-item" data-time="1591765200000" tabindex="0">10</div><div class="day-item" data-time="1591851600000" tabindex="0">11</div><div class="day-item" data-time="1591938000000" tabindex="0">12</div><div class="day-item" data-time="1592024400000" tabindex="0">13</div><div class="day-item" data-time="1592110800000" tabindex="0">14</div><div class="day-item" data-time="1592197200000" tabindex="0">15</div><div class="day-item" data-time="1592283600000" tabindex="0">16</div><div class="day-item" data-time="1592370000000" tabindex="0">17</div><div class="day-item" data-time="1592456400000" tabindex="0">18</div><div class="day-item" data-time="1592542800000" tabindex="0">19</div><div class="day-item is-start-date is-end-date" data-time="1592629200000" tabindex="0">20</div><div class="day-item" data-time="1592715600000" tabindex="0">21</div><div class="day-item" data-time="1592802000000" tabindex="0">22</div><div class="day-item" data-time="1592888400000" tabindex="0">23</div><div class="day-item" data-time="1592974800000" tabindex="0">24</div><div class="day-item" data-time="1593061200000" tabindex="0">25</div><div class="day-item" data-time="1593147600000" tabindex="0">26</div><div class="day-item" data-time="1593234000000" tabindex="0">27</div><div class="day-item" data-time="1593320400000" tabindex="0">28</div><div class="day-item" data-time="1593406800000" tabindex="0">29</div><div class="day-item" data-time="1593493200000" tabindex="0">30</div></div></div></div></div><div class="container__tooltip"></div>
</div>
<div class="litepicker" data-plugins="" style="display: none;"><div class="container__main"><div class="container__months"><div class="month-item"><div class="month-item-header"><button type="button" class="button-previous-month"><!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 6l-6 6l6 6"></path></svg></button><div><strong class="month-item-name">June</strong><span class="month-item-year">2020</span></div><button type="button" class="button-next-month"><!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 6l6 6l-6 6"></path></svg></button></div><div class="month-item-weekdays-row"><div title="Monday">Mon</div><div title="Tuesday">Tue</div><div title="Wednesday">Wed</div><div title="Thursday">Thu</div><div title="Friday">Fri</div><div title="Saturday">Sat</div><div title="Sunday">Sun</div></div><div class="container__days"><div class="day-item" data-time="1590987600000" tabindex="0">1</div><div class="day-item" data-time="1591074000000" tabindex="0">2</div><div class="day-item" data-time="1591160400000" tabindex="0">3</div><div class="day-item" data-time="1591246800000" tabindex="0">4</div><div class="day-item" data-time="1591333200000" tabindex="0">5</div><div class="day-item" data-time="1591419600000" tabindex="0">6</div><div class="day-item" data-time="1591506000000" tabindex="0">7</div><div class="day-item" data-time="1591592400000" tabindex="0">8</div><div class="day-item" data-time="1591678800000" tabindex="0">9</div><div class="day-item" data-time="1591765200000" tabindex="0">10</div><div class="day-item" data-time="1591851600000" tabindex="0">11</div><div class="day-item" data-time="1591938000000" tabindex="0">12</div><div class="day-item" data-time="1592024400000" tabindex="0">13</div><div class="day-item" data-time="1592110800000" tabindex="0">14</div><div class="day-item" data-time="1592197200000" tabindex="0">15</div><div class="day-item" data-time="1592283600000" tabindex="0">16</div><div class="day-item" data-time="1592370000000" tabindex="0">17</div><div class="day-item" data-time="1592456400000" tabindex="0">18</div><div class="day-item" data-time="1592542800000" tabindex="0">19</div><div class="day-item is-start-date is-end-date" data-time="1592629200000" tabindex="0">20</div><div class="day-item" data-time="1592715600000" tabindex="0">21</div><div class="day-item" data-time="1592802000000" tabindex="0">22</div><div class="day-item" data-time="1592888400000" tabindex="0">23</div><div class="day-item" data-time="1592974800000" tabindex="0">24</div><div class="day-item" data-time="1593061200000" tabindex="0">25</div><div class="day-item" data-time="1593147600000" tabindex="0">26</div><div class="day-item" data-time="1593234000000" tabindex="0">27</div><div class="day-item" data-time="1593320400000" tabindex="0">28</div><div class="day-item" data-time="1593406800000" tabindex="0">29</div><div class="day-item" data-time="1593493200000" tabindex="0">30</div></div></div></div></div><div class="container__tooltip"></div>
</div>

@endsection
@push('scripts')
<script>

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
    
    $(document).ready(function(){
            
        $('input[type="file"][name="featured_image"]').ijaboViewer({
                preview: "#image-previewer",
                allowedExtensions: ['jpg', 'jpeg', 'png'],
                onInvalidType: function(message, element) {
                    toastr.error(message);
                }
        });

        $('form#editEventForm').on('submit', function(e){
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
                        toastr.success(response.msg);
                    } else {
                        toastr.error(response.msg);
                    }
                },
                error: function(response) {
                    toastr.remove();
                    $.each(response.responseJSON.errors, function(prefix, val) {
                        $(form).find('span.' + prefix + '_error').text(val[0]);
                    });
                }
            });
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
    	window.Litepicker && (new Litepicker({
    		element: document.getElementById('datepicker-icon-start'),
    		buttonText: {
    			previousMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>`,
    			nextMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>`,
    		},
    	}));
    });

    document.addEventListener("DOMContentLoaded", function () {
    	window.Litepicker && (new Litepicker({
    		element: document.getElementById('datepicker-icon-end'),
    		buttonText: {
    			previousMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>`,
    			nextMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>`,
    		},
    	}));
    });
</script>

@endpush