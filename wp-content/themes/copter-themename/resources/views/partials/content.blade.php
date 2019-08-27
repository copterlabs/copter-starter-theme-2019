<artice {{ post_class('card mb-5') }}>
  {{ the_post_thumbnail('medium', array('class' => 'card-img-top h-100')) }}
  <div class="card-body">
    <h2 class="card-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>
    <p class="card-text">{{ the_excerpt() }}</p>
    <a href="{{ get_permalink() }}" class="btn btn-primary">Read Post</a>
  </div>
  <div class="card-footer text-muted">
    @include('partials/entry-meta')
  </div>
</artice>
