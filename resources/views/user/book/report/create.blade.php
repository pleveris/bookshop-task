<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header border-bottom-0">
          <h5 class="modal-title" id="id_r">Report Book</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{ route('report.store', $book)}}">
          @csrf
          <div class="modal-body">
            <div class="form-group">
              <label for="r_id">{{ $book->title}}</label>
            </div>
            <div class="form-group">
              <label for="r_id">Please write a detailed description/a list of clear reasons, why you want to report this book? Unclear explanations won't be considered!</label>
              <textarea type="text" class="form-control"  name="report_text" placeholder="Give reasons why you are reporting this book..." rows="2"></textarea>
            </div>
          </div>
          <div class="modal-footer border-top-0 d-flex justify-content-center">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </form>
      </div>
    </div>
</div>