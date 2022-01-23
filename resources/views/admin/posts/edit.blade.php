<x-layout>
    <x-setting :heading="'Edit Post: ' . $post->title">
        <form method="POST" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="title" :value="old('title', $post->title)"  />
            <x-form.input name="slug" :value="old('slug', $post->slug)"  />


            <x-form.textarea name="excerpt" >{{ old('excerpt', $post->excerpt) }}</x-form.textarea>
            <x-form.textarea name="body" >{{ old('body', $post->body) }}</x-form.textarea>

            <x-form.field>
                <x-form.label name="category"/>

                <select name="category_id" id="category_id" >
                    @foreach (\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category"/>
            </x-form.field>
            <div class="flex justify-end">
                <x-button1>Update</x-button1>

            </div>
        </form>
    </x-setting>
</x-layout>
