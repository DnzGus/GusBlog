<form action="{{ url('/post') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <label for="title">Title</label><br>
  <input type="text" id="title" name="title"><br>
  <label for="description">Description</label><br>
  <textarea cols="30" rows="15" id="description" name="description"></textarea>
  <input type="file" name="photo">
  <input type="submit" value="Submit">
</form> 