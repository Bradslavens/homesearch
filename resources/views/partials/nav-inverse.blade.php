<div class="nav-container nav-inverse">
    <nav>
        <a href="/"><h1>Slavens Realty</h1></a>

        <button class="nav-button" onclick="goBack()">Back</button>

        <div class="toggle">
           <button data-toggle="nav" class="rotatable">
             <span class="bar">&horbar;</span>
             <span class="bar">&horbar;</span>
             <span class="bar">&horbar;</span>
           </button>
        </div>

    </nav>
    
    <div data-target="nav" class="links">
      <a href="/">Home</a>
      <a href="{{route('contact.create')}}">Contact</a>
      <a href="{{route('careers')}}">Careers</a>
      <a href="about">About</a>
    </div>
</div>