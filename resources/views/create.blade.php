<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <style type="text/tailwindcss">
    @layer utilities {
      .container{
        @apply px-10 mx-auto
      }
    }
  </style>
    <title>CRUD</title>
</head>
<body>
    <div class="container">
    <div class="flex justify-between my-5">
    <h class="text-red-500">Create</h>
    <a href="/" class="bg-green-600 text-white rounded py-2 px-4">Back To Home</a>
    </div>
    <div>
        <form method="POST" action="{{route('store')}}" enctype="multipart/form-data">
            @csrf
           <div class="flex flex-col gap-5">
            <label for="">Name</label>
           <input type="text" name="name" id="">
           @error('name')
           <p class="text-red-500">{{$message}}</p>
           @enderror

           <label for="">Description</label>
            <input type="text" name="description" id="">
            @error('description')
           <p class="text-red-500">{{$message}}</p>
           @enderror

            <label for="">Select Image</label>
            <input type="file" name="image" id="">
            @error('image')
           <p class="text-red-500">{{$message}}</p>
           @enderror

            <div>
            <input type="submit" value="Submit" class="bg-green-600 py-2 px-4 rounded text-white">
            </div>
           </div>

        </form>
    </div>
    </div>
</body>
</html>