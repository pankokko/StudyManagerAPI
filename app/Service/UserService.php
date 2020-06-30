<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;


class UserService
{

    public function storePersonalData(array $data)
    {
        $user = User::find(Auth::id());

        DB::beginTransaction();

        try {
            $user = $user->update([
                'weight' => $data['weight'],
                'height' => $data['height'],
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error($e->getMessage());
            return null;
        }

        DB::commit();

        return $user;
    }
}

?>
