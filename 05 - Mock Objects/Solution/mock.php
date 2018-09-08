<?php

class MockUser extends User
{
    public function delete($i)
    {
        return true;
    }
}