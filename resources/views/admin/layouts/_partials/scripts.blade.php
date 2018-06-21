<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="{{ request()->root() }}/admin/assets/js/jquery.min.js"></script>

<script src="{{ request()->root() }}/admin/assets/js/bootstrap-rtl.min.js"></script>
<script src="{{ request()->root() }}/admin/assets/js/detect.js"></script>
<script src="{{ request()->root() }}/admin/assets/js/fastclick.js"></script>
<script src="{{ request()->root() }}/admin/assets/js/jquery.blockUI.js"></script>
<script src="{{ request()->root() }}/admin/assets/js/waves.js"></script>
<script src="{{ request()->root() }}/admin/assets/js/jquery.nicescroll.js"></script>
<script src="{{ request()->root() }}/admin/assets/js/jquery.slimscroll.js"></script>
<script src="{{ request()->root() }}/admin/assets/js/jquery.scrollTo.min.js"></script>

<!-- KNOB JS -->
<!--[if IE]>
<script type="text/javascript" src="{{ request()->root() }}/assets/plugins/jquery-knob/excanvas.js"></script>
<![endif]-->
<script src="{{ request()->root() }}/admin/assets/plugins/jquery-knob/jquery.knob.js"></script>

<!--Morris Chart-->
<!-- <script src="{{ request()->root() }}/admin/assets/plugins/morris/morris.min.js"></script> -->
<script src="{{ request()->root() }}/admin/assets/plugins/raphael/raphael-min.js"></script>

<!-- Dashboard init -->
<script src="{{ request()->root() }}/admin/assets/pages/jquery.dashboard.js"></script>
<script src="{{ request()->root() }}/admin/assets/plugins/fileuploads/js/dropify.min.js"></script>

<!-- Validation js (Parsleyjs) -->
<script type="text/javascript" src="{{ request()->root() }}/admin/assets/plugins/parsleyjs/dist/parsley.min.js"></script>

<script type="text/javascript" src="{{ request()->root() }}/admin/assets/plugins/multiselect/js/jquery.multi-select.js"></script>
<script src="{{ request()->root() }}/admin/assets/plugins/select2/dist/js/select2.min.js" type="text/javascript"></script>

<!-- App js -->
<script src="{{ request()->root() }}/admin/assets/js/jquery.core.js"></script>
<script src="{{ request()->root() }}/admin/assets/js/jquery.app.js"></script>
<script src="{{ request()->root() }}/admin/assets/js/main.js"></script>
<script src="{{ request()->root() }}/admin/assets/js/validate.js"></script>

<script src="http://jeremyfagis.github.io/dropify/dist/js/dropify.js"></script>


    <script type="text/javascript">

    	$(document).ready(function() {
			$('form').parsley();
		});

		
        $('.dropify').dropify({
            messages: {
                'default': 'اسحب وافلت الصورة هنا',
	            'replace': 'اسحب وافلت هنا او اضغط للإستبدال',
	            'remove': 'حذف',
	            'error': 'لقد حدث خطأ ما, حاول مرة آخرى.'
            },
            error: {
                'fileSize': 'The file size is too big (1M max).',
                'fileExtension': 'الصيغة غير صحيحة الصيغ المسموح بها فى النظام (pdf png gif jpg jpeg)',
            }
        });

        $(document).ready(function () {

            var table = $('#datatable-fixed-header').DataTable({
                fixedHeader: true,
                columnDefs: [{orderable: false, targets: [0]}],
                "language": {
                    "lengthMenu": "عرض _MENU_ للصفحة",
                    "info": "عرض صفحة _PAGE_ من _PAGES_",
                    "infoEmpty": "لا توجد بيانات مسجلة متاحة ",
                    "infoFiltered": "(تصفية من _MAX_ الاجمالى)",
                    "paginate": {
                        "first": "الاول",
                        "last": "الاخير",
                        "next": "التالى",
                        "previous": "السابق"
                    },
                    "search": "البحث:",
                    "zeroRecords": "لا توجد بيانات متاحة حالياً",
                },
            });  
        });

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    @if(session()->has('success'))
    setTimeout(function () {
        showMessage('{{ session()->get('success') }}' , 'success');
    }, 3000);

    @endif

    @if(session()->has('error'))
    setTimeout(function () {
        showMessage('{{ session()->get('error') }}' , 'error');
    }, 3000);

    @endif

    function showMessage(message , type) {

        var shortCutFunction = type ;
        var msg = message;

        var title = type == 'success' ? 'نجاح' : 'فشل';
        toastr.options = {
            positionClass: 'toast-top-center',
            onclick: null,
            showMethod: 'slideDown',
            hideMethod: "slideUp",
        };
        var $toast = toastr[shortCutFunction](msg, title);
        // Wire up an event handler to a button in the toast, if it exists
        $toastlast = $toast;

    }
        
    </script>

@yield('scripts')


