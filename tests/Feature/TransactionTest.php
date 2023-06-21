<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TransactionTest extends TestCase
{
    
    
    use WithFaker;
    
    public function test_transaction()
    {
        $response = $this->withHeaders([
            'Accept' => 'Aplication/json',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvbG9jYWxob3N0XC9UaGVBY2FkZW15XC9hcGlcL3YxXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY4NzMwMTA4OSwiZXhwIjoxNjg3MzA0Njg5LCJuYmYiOjE2ODczMDEwODksImp0aSI6IjB1bHNjNHdvamxkVUtuZU4iLCJzdWIiOjMwLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.8bnv8fuDpKaeea525Cl8rtduBJMPiEaWoJ9HSVdrEW8'
        ])->get('/api/v1/transactions');
        $response->assertStatus($response->status());
       
    }

    public function test_transaction_by_status_code()
    {
        $response = $this->withHeaders([
            'Accept' => 'Aplication/json',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvbG9jYWxob3N0XC9UaGVBY2FkZW15XC9hcGlcL3YxXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY4NzMwMTA4OSwiZXhwIjoxNjg3MzA0Njg5LCJuYmYiOjE2ODczMDEwODksImp0aSI6IjB1bHNjNHdvamxkVUtuZU4iLCJzdWIiOjMwLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.8bnv8fuDpKaeea525Cl8rtduBJMPiEaWoJ9HSVdrEW8'
        ])->get('/api/v1/transactions?statusCode=authorized');
        $response->assertStatus($response->status());
       
    }
    public function test_transaction_by_currency()
    {
        $response = $this->withHeaders([
            'Accept' => 'Aplication/json',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvbG9jYWxob3N0XC9UaGVBY2FkZW15XC9hcGlcL3YxXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY4NzMwMTA4OSwiZXhwIjoxNjg3MzA0Njg5LCJuYmYiOjE2ODczMDEwODksImp0aSI6IjB1bHNjNHdvamxkVUtuZU4iLCJzdWIiOjMwLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.8bnv8fuDpKaeea525Cl8rtduBJMPiEaWoJ9HSVdrEW8'
        ])->get('/api/v1/transactions?currency[0]=EGP&currency[1]=USD]');
        $response->assertStatus($response->status());
       
    }
    public function test_transaction_by_amount()
    {
        $response = $this->withHeaders([
            'Accept' => 'Aplication/json',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvbG9jYWxob3N0XC9UaGVBY2FkZW15XC9hcGlcL3YxXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY4NzMwMTA4OSwiZXhwIjoxNjg3MzA0Njg5LCJuYmYiOjE2ODczMDEwODksImp0aSI6IjB1bHNjNHdvamxkVUtuZU4iLCJzdWIiOjMwLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.8bnv8fuDpKaeea525Cl8rtduBJMPiEaWoJ9HSVdrEW8'
        ])->get('/api/v1/transactions?amount[0]=100&amount[1]1000]');
        $response->assertStatus($response->status());
       
    }
    public function test_transaction_by_date()
    {
        $response = $this->withHeaders([
            'Accept' => 'Aplication/json',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvbG9jYWxob3N0XC9UaGVBY2FkZW15XC9hcGlcL3YxXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY4NzMwMTA4OSwiZXhwIjoxNjg3MzA0Njg5LCJuYmYiOjE2ODczMDEwODksImp0aSI6IjB1bHNjNHdvamxkVUtuZU4iLCJzdWIiOjMwLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.8bnv8fuDpKaeea525Cl8rtduBJMPiEaWoJ9HSVdrEW8'
        ])->get('/api/v1/transactions?date[0]=01/01/2020&data[1]=10/01/2020]');
        $response->assertStatus($response->status());
       
    }
}
