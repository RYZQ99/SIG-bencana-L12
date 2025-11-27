<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeojsonFile;
use Illuminate\Support\Facades\Storage;

class GeojsonFileController extends Controller
{
    // List table
    public function index()
    {
        $files = GeojsonFile::all();
        return view('geojson.index', compact('files'));
    }

    // Upload Form
    public function create()
    {
        return view('geojson.create');
    }

    // Simpan data & file
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'file' => 'required|mimes:geojson,json'
        ]);

        $uploaded = $request->file('file');
        $filename = time().'_'.$uploaded->getClientOriginalName();

        Storage::disk('local')->put('geojson/'.$filename, file_get_contents($uploaded));

        GeojsonFile::create([
            'name' => $request->name,
            'filename' => $filename,
        ]);

        return redirect()->route('geojson.index')->with('success', 'GeoJSON berhasil diupload.');
    }

    // Tampilkan isi detail file
    public function show($id)
    {
        $file = GeojsonFile::findOrFail($id);
        $content = Storage::disk('local')->get('geojson/'.$file->filename);

        return view('geojson.show', compact('file', 'content'));
    }

    // Deploy file (ditampilkan di dashboard)
    public function deploy($id)
{
    // Set semua tidak aktif
    GeojsonFile::query()->update(['is_deployed' => false]);

    // Aktifkan file terpilih
    $file = GeojsonFile::findOrFail($id);
    $file->is_deployed = true;
    $file->save();

    return redirect()->back()->with('success', 'GeoJSON berhasil di-deploy!');
}


    // Delete file & DB record
    public function destroy($id)
    {
        $file = GeojsonFile::findOrFail($id);

        Storage::disk('local')->delete('geojson/'.$file->filename);
        $file->delete();

        return redirect()->route('geojson.index')->with('success', 'GeoJSON berhasil dihapus.');
    }
}
