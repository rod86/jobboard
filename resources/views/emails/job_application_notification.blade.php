<h1>Application for {{ $job->title }}</h1>

<p>
    A candidate has applied the role {{ $job->title }}
</p>

<table cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td><b>Name:</b></td>
        <td>{{ $candidate->name }}</td>
    </tr>
    <tr>
        <td><b>Email:</b></td>
        <td>{{ $candidate->email }}</td>
    </tr>
    <tr>
        <td><b>Phone:</b></td>
        <td>{{  ($candidate->phone) ? $candidate->phone : '-' }}</td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center;">
            <a href="{{ asset('storage/resumes/' . $candidate->resume) }}" style="font-size: 16px;">Download Resume</a>
        </td>
    </tr>
</table>