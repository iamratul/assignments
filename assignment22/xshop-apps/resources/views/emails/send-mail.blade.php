<div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
    <div style="margin:50px auto;width:70%;padding:20px 0">
        <div style="border-bottom:1px solid #eee">
            <a href="" style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600">
                <h1>{{ $mailSubject }}</h1>
            </a>
        </div>
        <div style="margin: 20px auto;">
            <img src="{{ $mailImage }}" alt="Product Image" width="100%">
        </div>
        <p style="font-size:1.1em">
            {{ $mailContent }}
        </p>
        <a href="{{ $mailLink }}" target="_blank"
            style="display: block; background: #00466a;margin: 0 auto;width: max-content;padding: 8px 15px;color: #fff;border-radius: 4px; text-decoration:none;">Learn
            More</a>
        <p style="font-size:0.9em; border-bottom:1px solid #eee">Regards,<br />Mamduh Fashion</p>

        <div style="float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300;">
            <p>Mamduh Fashion</p>
            <p>Jashore Sadar</p>
            <p>Jashore</p>
        </div>
    </div>
</div>
