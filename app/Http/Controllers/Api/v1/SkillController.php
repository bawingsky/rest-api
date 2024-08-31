<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Requests\UpdateSkillRequest;
use App\Http\Resources\v1\SkillResource;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index() {  

        return response()->json([
            'message' => 'This is the idex',
            'data' => SkillResource::collection(Skill::all())
        ]);


    }

    public function show(Skill $skill) {
    
        return new SkillResource($skill);

    }

    public function store(StoreSkillRequest $request) {

        $skill = Skill::create($request->validated());
        return new SkillResource($skill);
    }

    public function update(UpdateSkillRequest $request, Skill $skill) {
        
        $skill->update($request->validated());
        // return $updated_skill;
        return new SkillResource($skill);

    }


    public function destroy(Skill $skill) {
        
        $skill->delete();
        return [
            "message" => "Skill deleted successfully",
            "id" => $skill->id
        ];

    }
}
