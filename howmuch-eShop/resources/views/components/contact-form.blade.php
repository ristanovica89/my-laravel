@include('components.errors-flash-msg')
@include('components.success-flash-msg')

<form class="col mt-4" action="{{ route('contact.sendMessage') }}" method="post">
  @csrf
  <div class="mb-3">
    <label for="contact-email" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" id="contact-email">
  </div>
  <div class="mb-3">
    <label for="contact-subject" class="form-label">Subject</label>
    <input type="text" class="form-control" name="subject" id="contact-subject">
  </div>
  <div class="mb-3">
    <label for="contact-message" class="form-label">Message</label>
    <textarea class="form-control" name="message" id="contact-message" rows="2"></textarea>
  </div>
  <button type="submit" class="btn btn-success w-100">Submit</button>
</form>

