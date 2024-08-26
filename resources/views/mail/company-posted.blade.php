<h2>
    {{ $company->name }}
</h2>

<p>
    Congrats! Your company information has been added to our website.
</p>

<p>
    <a href="{{ url('/companies/' . $company->id) }}">View Your Company Information</a>
</p>
