
            <div class="container">
            <h1>User List</h1>

                    <table class="table" style="border-collapse: collapse;">
                        <thead>
                            <tr>
                                <th style="border: 1px solid #000;">Name</th>
                                    <th style="border: 1px solid #000;">Email</th>
                                <th style="border: 1px solid #000; border-collapse:separate;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                         <tr>
                        <td style="border: 1px solid #000;">{{ $user->name }}</td>
                        <td style="border: 1px solid #000;">{{ $user->email }}</td>
                        <td style="border: 1px solid #000;">{{ $user->status }}</td>
                        <td>
                            
                            
                        </td>
            </tr>
            @endforeach
                        </tbody>
                    </table>
                
            </main>
        </div>
    </div>

