@extends('pages.layout')


@section('content')
    <style>
        .list-group{
            background: #b3c6ff !important;
            border-color: #aed248;

        }
        body { background: #e5ecff !important; }
    </style>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>About The Competition:</h1>
            <p>The "Laura Ann Heckmann" competition is a soprano only annual competition which takes place in the Spring.  The first competion is scheduled for the Spring of 2016 and is currently open to entries.  The competition is for young soprano singers between the ages of 18-24 who are classically trained.  It requires two vocal selections the first being a German, French, or Italian opera aria in original language. The second submission required is a selection of your own choosing.  This selection can be musical theater, jazz, pop, standards or anything that best showcases you and your musical talents. The first selection will be judged on language, voice and sound quality, vocal technique, artistic interpretation, stage pressence and character portrayal. The second selection is ment to showcase your vocal talents with a piece of your choosing.  We are leaving this selection wide open to interpretation. In other words we recognize the fact that it is not sufficient to be only an opera singer but one must be able to cross over to other styles as well. We are looking for creativity in the selection.</p>
        </div>
        <div class="col-md-6">
            <h1>Steps:</h1>
            <ul class="list-group">
                <li class="list-group-item">Register on our website</li>
                <li class="list-group-item">Once registered and signed in, click onto the "About" Page. Then click the button "Enter The Competition" </li>
                <li class="list-group-item">Fill the form out and hit "Submit" button. Be sure to read the instructions carefully.</li>
                <li class="list-group-item">Drop in your headshot or shots. If successful your picture will appear when you refresh your page.</li>
                <li class="list-group-item">This is the time to review your profile you have the option to Update or Delete your profile submission once you leave this page you are locked in to the contest.
                    Should you decide to hit the "Update Profile" button, it will take you to your form for re-submission.</li>
            </ul>
            <a class="btn btn-primary btn-lg btn-block" href='/profiles/create' role="button">Enter The Competition</a>


        </div>
    </div>
</div>