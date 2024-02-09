<div>

    <section class="bg-white py-8 lg:py-16">
        <div class="mx-auto max-w-2xl px-4">
            <div class="mb-6 flex items-center justify-between">
                <h2 class="text-lg font-bold text-gray-900 lg:text-2xl">Discussion
                    ({{ $comments->count() }})</h2>
            </div>
            @auth
                @include('commentify::livewire.partials.comment-form', [
                    'method' => 'postComment',
                    'state' => 'newCommentState',
                    'inputId' => 'comment',
                    'inputLabel' => 'Your comment',
                    'button' => 'Post comment',
                ])
            @else
                <a class="mt-2 text-sm" href="/login">Log in to comment!</a>
            @endauth
            @if ($comments->count())
                @foreach ($comments as $comment)
                    <livewire:comment :$comment :key="$comment->id" />
                @endforeach
                {{ $comments->links() }}
            @else
                <p>No comments yet!</p>
            @endif
        </div>
    </section>
</div>
