<h2>
    {{ $job->title }}
</h2>

<p>
    Congrats! Your job has been posted successfully.
</p>

<p>
    <a href="{{ url('/jobs/' . $job->id) }}/edit"> Edit Job </a>
</p>
