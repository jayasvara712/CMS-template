<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Template CMS</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url(); ?>/stisla/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/stisla/node_modules/font-awesome/css/all.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url(); ?>/stisla/node_modules/summernote/dist/summernote-bs4.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/stisla/node_modules/codemirror/lib/codemirror.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/stisla/node_modules/codemirror/theme/duotone-dark.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/stisla/node_modules/selectric/public/selectric.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/stisla/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/stisla/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/stisla/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/asset/backend.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/stisla/assets/css/components.css">
</head>

<body>

    <div id="app">
        <div class="main-wrapper">
            <?= $this->include('admin/menu.php'); ?>
            <?= $this->renderSection('content'); ?>

            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2021 <div class="bullet"></div> Design By <a href="">Projasa</a>
                </div>
                <div class="footer-right">
                    2.3.0
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= base_url(); ?>/stisla/node_modules/jquery/dist/jquery.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
    <script src="<?= base_url(); ?>/stisla/node_modules/popper.js/dist/popper.js"></script>
    <script src="<?= base_url(); ?>/stisla/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>/stisla/node_modules/nicescroll/dist/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url(); ?>/stisla/node_modules/moment/min/moment.min.js"></script>

    <script src="<?= base_url(); ?>/stisla/assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="<?= base_url(); ?>/stisla/node_modules/summernote/dist/summernote-bs4.js"></script>
    <script src="<?= base_url(); ?>/stisla/node_modules/codemirror/lib/codemirror.js"></script>
    <script src="<?= base_url(); ?>/stisla/node_modules/codemirror/mode/javascript/javascript.js"></script>
    <script src="<?= base_url(); ?>/stisla/node_modules/selectric/public/jquery.selectric.min.js"></script>
    <script src="<?= base_url(); ?>/stisla/node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>/stisla/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>/stisla/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>

    <!-- Template JS File -->
    <script src="<?= base_url(); ?>/stisla/assets/js/scripts.js"></script>
    <script src="<?= base_url(); ?>/stisla/assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
    <script src="<?= base_url(); ?>/stisla/assets/js/page/modules-datatables.js"></script>
    <script src="<?= base_url(); ?>/asset/js/custom.js"></script>

    <!-- sweet alert -->
    <script src="<?= base_url(); ?>/stisla/node_modules/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?= base_url(); ?>/stisla/assets/js/page/modules-sweetalert.js"></script>

    <?= $this->renderSection('custom_js'); ?>

    <!-- multi form -->
    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
                document.getElementById("saveBtn").style.display = "none";
                document.getElementById("nextBtn").style.display = "inline";
            } else {
                document.getElementById("nextBtn").style.display = "none";
                document.getElementById("prevBtn").style.display = "inline";
                document.getElementById("saveBtn").style.display = "inline";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("sectionForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }
    </script>

    <script>
        $(document).on('click', '.view_data', function() {
            $('#view_galeri').modal();
            // $.ajax({
            //     url: "galeri_view.php",
            //     method: "POST",
            //     data: {
            //         perusahaan_id: perusahaan_id
            //     },
            //     success: function(data) {
            //         $('#desa_detail').html(data);
            //         $('#view_desa').modal('show');
            //     }
            // });
        });

        $('.summernote').summernote({
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'paragraph']],
                ['height', ['height']]
            ]
        });

        $('#panel-body-0').on('shown.bs.collapse', function() {
            $(".icon").addClass('glyphicon-chevron-up').removeClass('glyphicon-chevron-down');
        });

        $('#panel-body-0').on('hidden.bs.collapse', function() {
            $(".icon").addClass('glyphicon-chevron-down').removeClass('glyphicon-chevron-up');
        });

        //selection img
        function imgclick(id_gambar) {
            // document.getElementById("img_" + id_gambar).addClass("img-onclick")
            var v = document.getElementById("img_" + id_gambar);
            if (v.classList.contains("img-onclick")) {
                v.classList.remove("img-onclick");
            } else {
                v.className += " img-onclick";
            }
        }

        function img_save() {
            var y = document.getElementsByClassName('pilihan');
            var x = document.getElementById("samar_samar");
            x.innerHTML = "";
            let choice = '';
            for (let index = 0; index < y.length; index++) {
                if (y[index].classList.contains("img-onclick")) {
                    choice += y[index].id.replace("img_", "");
                    choice += ",";
                    var div = document.createElement("div");
                    div.className += "col-lg-3 img-selection";
                    var cln = y[index].cloneNode(true);
                    cln.id = "img_bayangan_" + index;
                    cln.classList.remove("img-onclick");
                    cln.classList.remove("pilihan");
                    div.appendChild(cln);
                    x.appendChild(div);
                }
            }
            document.getElementById("txt_gambar").value = choice.slice(0, -1);
            $('#view_galeri').modal('hide');
        }

        function layoutselect(id_gambar) {

            // document.getElementById("img_" + id_gambar).addClass("img-onclick")
            var v = document.getElementById("layout_" + id_gambar);
            var y = document.getElementsByClassName('pilihan');
            // var x = document.getElementById("isi_section");
            var z = document.getElementById("txt_layout");
            // x.innerHTML = "";
            let choice = '';


            if (v.classList.contains("layout-onclick")) {
                v.className += " kosong";
                v.classList.remove("layout-onclick");
                choice = z.value.slice(0, -1);
                z.value = choice;

            } else {
                v.classList.remove("layout-onclick");
                v.className += " layout-onclick";
                for (let index = 0; index < y.length; index++) {
                    if (y[index].classList.contains("layout-onclick")) {
                        choice += y[index].id.replace("layout_", "");
                        choice += ",";
                        // var div = document.createElement("div");
                        // div.className += "col-lg-3 img-selection";
                        // var cln = y[index].cloneNode(true);
                        // cln.id = "img_bayangan_" + index;
                        // cln.classList.remove("img-onclick");
                        // cln.classList.remove("pilihan");
                        // div.appendChild(cln);
                        // x.appendChild(div);
                    }
                }
                z.value += choice.slice(0, -1);

                let id = id_gambar;
                let index = 1;
                let contentSection = document.querySelector('div.content-section')

                function createSection() {
                    $(document).ready(function() {
                        $('.summernote').summernote({
                            toolbar: [
                                // [groupName, [list of button]]
                                ['style', ['bold', 'italic', 'underline', 'clear']],
                                ['font', ['strikethrough', 'superscript', 'subscript']],
                                ['fontsize', ['fontsize']],
                                ['color', ['color']],
                                ['para', ['ul', 'paragraph']],
                                ['height', ['height']]
                            ]
                        });
                    });

                    return `<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi Konten</label>
                    <div class="col-sm-12 col-md-7">
                    <textarea class="summernote" id="summernote txt_${index}" name="isi_konten[]" ></textarea>
                     </div>`;

                }

                if (id == 1 || id == 2) {
                    contentSection.insertAdjacentHTML('beforeend', createSection());
                } else if (id == 3) {
                    for (index; index < id; index++) {
                        contentSection.insertAdjacentHTML('beforeend', createSection());
                    }
                }

            }

        }

        // function urlmaker() {
        //     let judul = document.getElementById("judul");
        //     let url = document.getElementById("url");
        //     url.value = judul.value.toLowerCase().replace(" ", "-");
        // }
    </script>

</body>

</html>