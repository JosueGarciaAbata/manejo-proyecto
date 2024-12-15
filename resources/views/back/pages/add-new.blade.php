@extends('back.layouts.pages-layout')
@section('page-title', isset($pageTitle) ? $pageTitle : 'Añadir Noticia')

@section('page-header')
<div class="row g-2 align-items-center">
    <div class="col">
      <h2 class="page-title" style="font-weight: bold;">
        Añadir Nueva Noticia
      </h2>
    </div>
</div>
@endsection

@section('content')
<div class="row row-cards">
    <div class="col-12">
        <form action="{{ route('admin.news.create') }}" method="post" id="addNewForm" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="mb-3">
                                <label class="form-label">Título de Noticia</label>
                                <input type="text" class="form-control" name="tit_new" placeholder="Ingrese el título de la noticia">
                                <span class="text-danger error-text tit_new_error"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Descripción</label>
                                <textarea class="ckeditor form-control" name="des_new" rows="6" placeholder="Contenido..."
                                    id="des_new"></textarea>
                                <span class="text-danger error-text des_new_error"></span>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="mb-3">
                                <div class="form-label">Fecha de Publicación</div>
                                <div class="d-flex gap-2">
                                    <!-- Campo de fecha más amplio -->
                                    <div class="input-icon mb-2 flex-grow-1">
                                        <input class="form-control" name="fec_pub_new" placeholder="Seleccione una fecha" id="datepicker-icon-start" value="2020-06-20" readonly>
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
                                        <input type="text" name="pub_time_new" class="form-control" data-mask="00:00:00" data-mask-visible="true" placeholder="00:00:00" autocomplete="on" readonly>
                                    </div>
                                </div>
                                <span class="text-danger error-text fec_pub_new_error"></span>
                                <span class="text-danger error-text pub_time_new_error"></span>
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
                                <label for="tag_new" class="form-label">Tags de la Noticia</label>
                                <input type="text" class="form-control" name="tag_new">
                                <span class="text-danger error-text tag_new_error"></span>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Guardar Noticia</button>
                        </div>
                        
                    </div>
                </div>
            </div>
        </form>        
    </div>
</div>

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
    
    document.addEventListener("DOMContentLoaded", function () {
        const today = new Date();
        const formattedDate = today.toISOString().split('T')[0];
        document.querySelector('input[name="fec_pub_new"]').value = formattedDate;

        var timeField = document.querySelector("input[name='pub_time_new']");

        if (timeField) {
            setInterval(function () {
            var now = new Date();
            var hours = String(now.getHours()).padStart(2, '0');
            var minutes = String(now.getMinutes()).padStart(2, '0');
            var seconds = String(now.getSeconds()).padStart(2, '0');
            
            var currentTime = `${hours}:${minutes}:${seconds}`;
            
            timeField.value = currentTime;
        }, 1000);
        }

        ClassicEditor
            .create(document.querySelector('#des_new'))
            .then(editor => {
                window.editor = editor;
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
            imageShape: 'rectangular',
            allowedExtensions: ['jpg', 'jpeg', 'png'],
            onErrorShape: function(message, element) {
                toastr.error('Añade una imagen rectangular, por favor');
            },
            onInvalidType: function(message, element) {
                toastr.error(message);
            }
        });

        $('form#addNewForm').on('submit', function(e) {
            e.preventDefault();
            toastr.remove();
            var form = this;
            var formData = new FormData(form);
            if (window.editor) {
                formData.append('des_new', window.editor.getData());
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
                        $('input[name="tag_new"]').amsifySuggestags();
                        if (window.editor) {
                            window.editor.setData('');
                        }
                        toastr.success(response.msg);
                    } else {
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