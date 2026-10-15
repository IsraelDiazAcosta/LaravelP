@csrf
        <label for="">Title</label>
        <input type="text" name="title" value="{{ old('title',$post->title ) }}">

        <label for="">Slug</label>
        <input type="text" name="slug" value="{{ old ('slug',$post->slug )}}">

        <textarea name="content">{{ $post->content }}</textarea>

        <label for="">Category</label>
        <select name="category_id">

            @foreach ($categories as $title=>$id)
                <option {{ $post->category->id==$id? 'selected':''}}value="{{ $id }}">{{ $title }}</option>
                
            @endforeach

        </select>

        <label for="">Description</label>
        <textarea name="description">{{ $post->description }}</textarea>

        <label for="">Posted</label>
        <select name="posted" id="">
            <option {{ $post->posted=='not'? 'selected':''}}value="not">not</option>
            <option {{ $post->posted=='yes'? 'selected':''}}value="yes">yes</option>

        </select>

        @if (isset($task) && $task=='edit')
        
        <label for="">Image</label>
        <input type="file" name="image">
        @endif



        <button type=" submit">Send</button>