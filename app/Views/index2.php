<?= $this->extend('template_landing'); ?>
<?= $this->section('content'); ?>

<div>
    <nav id="navbar-landingpage" class="navbar navbar-expand-lg navbar-light ">
        <a class="navbar-brand" href="#">My App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#fat">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#mdo">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#one">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#two">Disabled</a>
                </li>
            </ul>
        </div>
    </nav>

    <div data-spy="scroll" data-target="#navbar-landingpage" data-offset="0">
        <h4 id="fat">@fat</h4>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Et fuga nam, porro minima architecto sapiente itaque quo quidem corporis iusto molestiae, consequatur nesciunt qui vero dolorum nostrum harum commodi asperiores dignissimos voluptatum quia quas unde, beatae alias? Quam iste quia quibusdam, similique molestiae ad laborum magni? Similique magni eius expedita.</p>
        <h4 id="mdo">@mdo</h4>
        <p>...</p>
        <h4 id="one">one</h4>
        <p>...</p>
        <h4 id="two">two</h4>
        <p>...</p>
        <h4 id="three">three</h4>
        <p>...</p>
    </div>
</div>

<?= $this->endSection(); ?>