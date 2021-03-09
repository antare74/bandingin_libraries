<?php
namespace App\Http\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Books{

    public function storeBooks($request){
        $result = ['status' => false, 'message' => ''];
        try {
            $validator  = Validator::make($request->all(), [
                'title'          => ['required', 'string', 'max:255'],
            ]);

            if ($validator->fails()){
                $result['message'] = $validator->errors()->all();
                return $result;
            }

            DB::beginTransaction();
            if (count($request->library_id) > 0){
                $books = new \App\Models\Books();

                if (isset($request->book_id)){
                    $books = $this->findBooksById($request->book_id);
                }

                $books->title = $request->title;
                $books->save();
                $books = $this->findBooksById($books->id);
                foreach ($request->library_id as $library) {
                    $books->libraries()->attach([$library]);
                }
            }

            DB::commit();

            $result['message']  = 'success to store books';
            $result['status']   = true;
            return $result;
        }catch (\Exception $e){
            $result['message'] = $e->getMessage();
            return $result;
        }
    }

    public function deleteBooks($id){
        $result = ['status' => false, 'message' => ''];
        try {
            if (!$id){
                $result['message'] = 'missing parameter id';
                return $result;
            }
            DB::beginTransaction();

            $books = $this->findBooksById($id);

            if (!$books){
                $result['message'] = 'libraries is not found';
                return $result;
            }

            if (count($books->libraries) > 0){
                foreach ($books->libraries as $library) {
                    $books->libraries()->detach([$library->id]);
                }
            }

            $books->delete();

            DB::commit();

            $result['message']  = 'success to store books';
            $result['status']   = true;
            return $result;
        }catch (\Exception $e){
            $result['message'] = $e->getMessage();
            return $result;
        }
    }

    public function findBooksById($id){
        return \App\Models\Books::with(['libraries'])
            ->find($id);
    }

    public function getAllBooks(){
        return \App\Models\Books::with(['libraries'])
            ->oldest()
            ->get();
    }
}
