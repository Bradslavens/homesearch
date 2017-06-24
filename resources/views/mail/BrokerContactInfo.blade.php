<h1>You Received a contact request</h1>

<ul>
    <li>name: {{$contact->name}}</li>
    <li>phone: {{$contact->phone}}</li>
    @foreach($contact->comments as $comment)
        <li>{{$comment->comment}}</li>
    @endforeach
</ul>