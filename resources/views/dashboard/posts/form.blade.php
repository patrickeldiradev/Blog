
@include('dashboard.partials.messages')

<form method="post" action="{{ route('dashboard.post.store') }}">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">{{ __('Title') }}</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="{{ __('Title') }}">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">{{ __('Description') }}</label>
        <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
    </div>
    <div class="mb-3">
        <label for="publication_date" class="form-label">{{ __('Publication Date') }}</label>
        <input type="date" class="form-control" id="publication_date" name="publication_date" value="{{ old('publication_date') }}" placeholder="{{ __('Publication Date') }}">
    </div>
    <button class="btn btn-success">{{ __('Submit') }}</button>
</form>
