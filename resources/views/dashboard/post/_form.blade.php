@csrf
        <label for="">Title</label>
        <input type="text" class="form-control" name="title" value="{{ old('title',$post->title ) }}">

        <label for="">Slug</label>
        <input type="text" class="form-control" name="slug" value="{{ old ('slug',$post->slug )}}">

        <textarea name="content">{{ $post->content }}</textarea>

        <label for="category_id" class="form-control">Category</label>
        <select name="category_id" id="category_id" class="form-select" required>
            <option value="">Select a category</option>
            @foreach ($categories as $title=>$id)
                <option value="{{ $id }}" @selected((string) old('category_id', $post->category_id) === (string) $id)>
                    {{ $title }}
                </option>
            @endforeach
        </select>

        <label for="" class="form-control">Description</label>
        <textarea name="description">{{ $post->description }}</textarea>

        <label for="" class="form-control">Posted</label>
        <select name="posted" id="">
            <option {{ $post->posted=='not'? 'selected':''}}value="not">not</option>
            <option {{ $post->posted=='yes'? 'selected':''}}value="yes">yes</option>

        </select>

        @if (isset($task) && $task=='edit')
        
        <label for="">Image</label>
        <input type="file" name="image">
        @endif



        <button type=" submit" class="btn btn-success mt-3">Send</button>