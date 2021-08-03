<x-app-layout>
    @section('page-title')
            {{ $ticket }}
    @endsection

    @section('content') 
    <div class="content">

        <!-- Ticket basic information -->
        <div class="row">
            @include('tickets.ticket-information')
        </div><!--endofcol-->

        <!-- Page Navigation or Breadcrumb -->
        <div class="row">
            @include('tickets.breadcrumb')         
        </div><!--endofrow-->
        @if(count($needsEdit) >= 1)
            <div id="needsEdit" class="row">
                <h3 class="noteHeading">Needs Edit</h3>
                <!-- Release Note-->
                <div class="col-lg-6">
                    @include('tickets.needs-edit-RN')
                </div><!--endofcol-->

                <!-- WorkAround Note-->
                <div class="col-lg-6">
                    @include('tickets.needs-edit-WA')
                </div><!--endofcol-->
            </div><!--endofrow-->
        @endif
        <div class="row">
            <!-- Release Note-->
            <div class="col-lg-6">
                @include('tickets.release-note')
            </div><!--endofcol-->

            <!-- WorkAround Note-->
            <div class="col-lg-6">
                @include('tickets.workaround')
            </div><!--endofcol-->
        </div><!--endofrow-->
    </div><!--endofrow-->

    <div id="galleryModal">
        <div id="galleryModalContent" class="row clear">
            <div class="col-lg-12 float-right">
                <div id="closeGalleryModal">
                    <span id="spanClose"><i class="fas fa-times"></i></span>
                </div><!--closeBtnColumn-->
            </div><!--endofcol-->
            <div id="imgContent" class="col-lg-12 float-left">
            </div><!--endofcol-->
        </div> <!-- galleryModalContent -->
    </div>

    <script >
    // New Page Modal
        const pageModalBtn = document.getElementById('pageModalBtn');
        const pageModal = document.getElementById('pageModalBoxContainer');
        const pageCloseBtnColumn = document.getElementById('pageCloseBtnColumn');

        pageModalBtn.addEventListener("click", function(){
            pageModal.style.display = 'block';
        });

        pageCloseBtnColumn.addEventListener("click", function(){
            //console.log('modal closed, page reloads');
            pageModal.style.display = 'none';
            location.reload();
        });

        // new note modal pop up
        const ModalBtn = document.getElementById('ModalBtn');
        const modal = document.getElementById('modalBoxContainer');
        const modalCloseBtn = document.getElementById('closeBtnColumn');
        const galleryModal = document.getElementById('galleryModal');
        ModalBtn.addEventListener("click", function(){
            modal.style.display = 'block';
        });

        modalCloseBtn.addEventListener("click", function(){
            //console.log('modal closed, page reloads');
            modal.style.display = 'none';
            location.reload();
        });
    </script>
    @endsection   
</x-app-layout>
