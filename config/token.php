<?php

return [
    'secret_key' => env('JWT_SECRET_KEY','default'),

    'expire'=>env('JWT_EXPIRE',3600),

    'encrypt'=>env('JWT_ENCRYPT','SHA1'),

];