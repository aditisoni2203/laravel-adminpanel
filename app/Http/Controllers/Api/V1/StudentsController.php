<?php

namespace App\Http\Controllers\Api\V1;
use App\Models\Student\Student;
use App\Repositories\Backend\Student\StudentRepository;
use App\Http\Resources\StudentsResource;
use Illuminate\Http\Request;
use Validator;

class StudentsController extends APIController
{
    protected $repository;

    /**
     * __construct.
     *
     * @param $repository
     */
    public function __construct(StudentRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Return the students.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $limit = $request->get('paginate') ? $request->get('paginate') : 25;
        $orderBy = $request->get('orderBy') ? $request->get('orderBy') : 'ASC';
        $sortBy = $request->get('sortBy') ? $request->get('sortBy') : 'created_at';

        return StudentsResource::collection(
            $this->repository->getForDataTable()->orderBy($sortBy, $orderBy)->paginate($limit)
        );
    }

    /**
     * Return the specified resource.
     *
     * @param Student student
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Student $student)
    {
        return new StudentsResource($student);
    }

    /**
     * Creates the Resource for Student.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validation = $this->validateStudent($request);

        if ($validation->fails()) {
            return $this->throwValidation($validation->messages()->first());
        }

        $a = $this->repository->create($request->all());
        //dd($a);
        return new StudentsResource(Student::orderBy('created_at', 'desc')->first());
        //return new StudentsResource($a);
    }

    /**
     * Update student.
     *
     * @param Student    $student
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Student $student)
    {
        $validation = $this->validateStudents($request, 'update');

        if ($validation->fails()) {
            return $this->throwValidation($validation->messages()->first());
        }

        $this->repository->update($student, $request->all());

        $student = Student::findOrfail($student->id);

        return new StudentsResource($student);
    }

    /**
     * Delete Student.
     *
     * @param Student    $student
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Student $student, Request $request)
    {
        $this->repository->delete($student);

        return $this->respond([
            'message' => trans('alerts.backend.students.deleted'),
        ]);
    }

    /**
     * validate Student.
     *
     * @param $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function validateStudent(Request $request, $action = 'insert')
    {
        $profile_image = ($action == 'insert') ? 'required' : '';

        $publish_datetime = $request->publish_datetime !== '' ? 'required|date' : 'required';

        $validation = Validator::make($request->all(), [
            'profile_picture'    => $profile_image,
           /* 'publish_datetime'  => $publish_datetime,
            'content'           => 'required',
            'categories'        => 'required',
            'tags'              => 'required',*/
        ]);

        return $validation;
    }

     public function validateStudents(Request $request, $action = 'update')
    {
        $profile_image = ($action == 'insert') ? 'required' : '';

        $publish_datetime = $request->publish_datetime !== '' ? 'required|date' : 'required';

        $validation = Validator::make($request->all(), [
            'profile_picture'    => $profile_image,
           /* 'publish_datetime'  => $publish_datetime,
            'content'           => 'required',
            'categories'        => 'required',
            'tags'              => 'required',*/
        ]);

        return $validation;
    }

    /**
     * validate message for validate student.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function messages()
    {
        return [
          //  'first_name.required' => 'Please insert Student First Name',
           // 'first_name.max'      => 'Students First Name may not be greater than 191 characters.',
        ];
    }
}
