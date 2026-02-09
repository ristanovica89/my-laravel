<?php

namespace App\Repositories;

use App\Models\Contact;

class ContactRepository
{
  
  public function __construct(private readonly Contact $contact){}

  public function getAll()
  {
    return $this->contact->all();
  }

  public function findById(int $id): Contact
  {
    return $this->contact->where(['id', $id])->first();
  }

  public function create(array $data)
  {
    return $this->contact->create($data);
  }

  public function update(Contact $contact, array $data): Contact
  {
    $contact->update($data);
    return $contact->fresh();
  }

  public function delete(Contact $contact): bool
  {
    return (bool)$contact->delete();
  }

}