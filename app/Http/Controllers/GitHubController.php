<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Github\Client as GitHubClient;
// use Symfony\Contracts\EventDispatcher\Event;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Http;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Auth;

class GitHubController extends Controller
{
    private $github;

    // public function __construct(GitHubClient $github)
    // {
    //     $this->github = $github;
    //     $this->github->authenticate(env('GITHUB_TOKEN '), null, GitHubClient::AUTH_HTTP_TOKEN);

    //     // dd($this->github);
    // }

    public function addCollaborator(Request $request, $id)
    {
        try {

            // Find the product by its ID
            $product = Product::where('product_id', $id)->first();

            // If the Product is not found in a particular order then it will show the message.
            if (!$product) {
                return redirect()->route('orders')->with('status', 'Product not found');
            }

            // Find the Repository name in the Product table.
            $github_repo_name = $product->github_repo_name;

            // If the Admin has not setted the Github Repository name in particular product then it will show the message.
            if (!$github_repo_name) {
                return redirect()->route('orders')->with('status', 'GitHub repository name not set for this product');
            }

            // Get the authenticated admin role user GitHub Username.
            $auth_user = Auth::user();
            $github_user_name_admin = User::where('role', 'admin')->value('githubusername');

            // If the Admin has not added the Github Username in their profile then show the message.
            if (!$github_user_name_admin) {
                return redirect()->route('orders')->with('status', 'Admin has not added their GitHub username in their profile');
            }

            // Get the authenticated user's Github Username.
            $github_user_name = $auth_user->githubusername;

            // If the Authenticated user's Github Username is not their then show the message.
            if (!$github_user_name) {
                return redirect()->route('orders')->with('status', 'You have not added your GitHub username in your profile');
            }

            // Check if the authenticated user is already a collaboratored in Github Repository.
            $check_response = Http::withHeaders([
                'Accept' => 'application/vnd.github+json',
                'Authorization' => 'Bearer ' . env('GITHUB_TOKEN'),
            ])->get("https://api.github.com/repos/{$github_user_name_admin}/{$github_repo_name}/collaborators/{$github_user_name}");

            if ($check_response->successful()) {

                // If the user is already added in the collaborator and accept the invitation in the mail then it will show the message.
                return redirect("https://github.com/{$github_user_name_admin}/{$github_repo_name}")->with('status', 'You have already added your username in github repository check your mail from where you can access the repository.');

            } elseif ($check_response->status()) {

                // If User is not added as a collaborator in the repository, then it will proceed to add.
                $response = Http::withHeaders([
                    'Accept' => 'application/vnd.github+json',
                    'Authorization' => 'Bearer ' . env('GITHUB_TOKEN'),
                ])->put("https://api.github.com/repos/{$github_user_name_admin}/{$github_repo_name}/collaborators/{$github_user_name}", ['permission' => 'pull']);

                if ($response->successful()) {
                    // When Collaborator will added successfully it will show the message
                    return redirect()->route('orders')->with('status', 'You have added your github username successfully, you will receive mail for invitation of the github repository in your registered mail.');
                } else {
                    $errorDetails = $response->json();
                    return response()->json(['error' => $errorDetails], $response->status());
                }
            } else {
                // It will Handle unexpected response
                return response()->json(['error' => 'Unexpected response from GitHub API'], $check_response->status());
            }
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function removeCollaborator(Request $request, $owner, $repo, $username)
    {
        try {
            $this->github->repository()->collaborators()->remove($owner, $repo, $username);
            return response()->json(['message' => 'Collaborator removed successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
