<!-- Modal -->
<div class="modal fade" id="depositModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Make a deposit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{url('deposits')}}" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount">
            </div>
            <input name="user_id" type="text" hidden value="{{Auth::user()->id}}">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="sendModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Send money to a user</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <form>
            <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount">
            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">User</label>
                <select name="receiver_id" id="">
                  @foreach($users as $user)
                  @if($user->id != Auth::user()->id)
                  <option value="1">Dave</option>
                  @endif 
                  @endforeach
                </select>
            </div>
            <input name="sender_id" type="text" hidden value="{{Auth::user()->id}}">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="transferModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Transfer money to another account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <form>
            <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount">
            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">Gateway</label>
                <select name="gateway" id="">
                  <option value="bank">Bank</option>
                  <option value="paypal">Paypal</option>
                </select>
            </div>
            <input name="user_id" type="text" hidden value="{{Auth::user()->id}}">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>