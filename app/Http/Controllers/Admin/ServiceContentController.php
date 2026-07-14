<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceContentController extends Controller
{
    /**
     * All defined services (slug => label).
     */
    public static function allServices(): array
    {
        return [
            'complete-it-infrastructure-transformation' => 'Complete IT Infrastructure Transformation',
            'corporate-ict-service-maintenance'         => 'Corporate IT / ICT Service & Maintenance',
            'infrastructure-as-a-service'               => 'Complete Maintenance of Infrastructure as a Service (IaaS)',
            'network-as-a-service'                      => 'Complete Maintenance of Network as a Service (NaaS)',
            'data-centre-solutions'                     => 'Data Centre Solutions',
            'network-operations-centre'                 => 'Network Operations Centre / NOC',
            'enterprise-cyber-security'                 => 'Enterprise Cyber Security & Threat Protection',
            'enterprise-wireless-solutions'             => 'Enterprise Wireless Solutions',
            'enterprise-video-surveillance'             => 'Enterprise Video Surveillance Systems (VSS)',
            'enterprise-voice-solutions'                => 'Enterprise Voice Solutions',
            'it-training-internship'                    => 'IT Training & Internship Programs',
            'tender-project-execution'                  => 'Tender Participation & Project Execution',
            'cloud-data-center-solutions'               => 'Cloud & Data Center Solutions',
            'backup-storage-disaster-recovery'          => 'Backup, Storage & Disaster Recovery',
            'ai-automation-intelligent-operations'      => 'AI, Automation & Intelligent Operations',
            'it-outsourcing-managed-solutions'          => 'IT Outsourcing & Managed Solutions',
            'network-infrastructure-design'             => 'Network Infrastructure Design',
        ];
    }

    /**
     * Admin: list all services.
     */
    public function index()
    {
        $services = self::allServices();
        // Count content items per service
        $counts = ServiceContent::selectRaw('service_slug, count(*) as total')
            ->groupBy('service_slug')
            ->pluck('total', 'service_slug');

        return view('admin.services.index', compact('services', 'counts'));
    }

    /**
     * Admin: show/edit content for one service.
     */
    public function show(string $slug)
    {
        $services = self::allServices();
        abort_unless(array_key_exists($slug, $services), 404);

        $label    = $services[$slug];
        $contents = ServiceContent::forSlug($slug)->get();

        return view('admin.services.show', compact('slug', 'label', 'contents'));
    }

    /**
     * Admin: store new content for a service.
     */
    public function store(Request $request, string $slug)
    {
        $services = self::allServices();
        abort_unless(array_key_exists($slug, $services), 404);

        $type = $request->input('content_type');

        $validated = $request->validate([
            'content_type' => 'required|in:text,image,video',
            'text_content'  => 'required_if:content_type,text|nullable|string',
            'image_file'    => 'required_if:content_type,image|nullable|image|max:5120',
            'video_url'     => 'required_if:content_type,video|nullable|url',
        ]);

        $content = '';
        if ($type === 'text') {
            $content = $request->input('text_content');
        } elseif ($type === 'image') {
            $path    = $request->file('image_file')->store('services', 'public');
            $content = $path;
        } elseif ($type === 'video') {
            $content = $request->input('video_url');
        }

        $maxOrder = ServiceContent::where('service_slug', $slug)->max('order') ?? -1;

        ServiceContent::create([
            'service_slug' => $slug,
            'content_type' => $type,
            'content'      => $content,
            'order'        => $maxOrder + 1,
        ]);

        return redirect()->route('admin.services.show', $slug)
            ->with('success', 'Content added successfully.');
    }

    /**
     * Admin: delete a content item.
     */
    public function destroy(string $slug, int $id)
    {
        $item = ServiceContent::where('service_slug', $slug)->findOrFail($id);

        // Delete image from storage if applicable
        if ($item->content_type === 'image') {
            Storage::disk('public')->delete($item->content);
        }

        $item->delete();

        return redirect()->route('admin.services.show', $slug)
            ->with('success', 'Content deleted.');
    }

    /**
     * Admin: reorder content via AJAX (POST JSON {ids: [1,2,3]}).
     */
    public function reorder(Request $request, string $slug)
    {
        $ids = $request->input('ids', []);
        foreach ($ids as $order => $id) {
            ServiceContent::where('service_slug', $slug)
                ->where('id', $id)
                ->update(['order' => $order]);
        }
        return response()->json(['status' => 'ok']);
    }
}
