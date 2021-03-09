<?php
namespace App\Http\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Libraries{

    public function storeLibraries($request){
        $result = ['status' => false, 'message' => ''];
        try {
            $validator  = Validator::make($request->all(), [
                'name'  => ['required', 'string', 'max:255'],
            ]);

            if ($validator->fails()){
                $result['message'] = $validator->errors()->all();
                return $result;
            }

            $libraries = new \App\Models\Libraries();

            if (isset($request->library_id)){
                $libraries = $this->findLibrariesById($request->library_id);
            }

            $libraries->name = $request->name;
            $libraries->save();

            $result['message']  = 'success to store libraries';
            $result['status']   = true;
            return $result;
        }catch (\Exception $e){
            $result['message'] = $e->getMessage();
            return $result;
        }
    }

    public function deleteLibraries($id){
        $result = ['status' => false, 'message' => ''];
        try {
            if (!$id){
                $result['message'] = 'missing parameter id';
                return $result;
            }
            DB::beginTransaction();

            $libraries = $this->findLibrariesById($id);

            if (!$libraries){
                $result['message'] = 'libraries is not found';
                return $result;
            }

            if (count($libraries->books) > 0){
                foreach ($libraries->books as $book) {
                    $libraries->books()->detach([$book->id]);
                }
            }

            $libraries->delete();

            DB::commit();

            $result['message']  = 'success to store books';
            $result['status']   = true;
            return $result;
        }catch (\Exception $e){
            $result['message'] = $e->getMessage();
            return $result;
        }
    }

    public function getLibraries(){
        return \App\Models\Libraries::with(['books'])
            ->oldest()
            ->get();
    }

    public function findLibrariesById($id){
        return \App\Models\Libraries::with(['books'])
            ->find($id);
    }
}
